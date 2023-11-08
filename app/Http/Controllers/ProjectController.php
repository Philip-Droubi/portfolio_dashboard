<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectMedia;
use App\Models\ProjectTech;
use Carbon\Carbon;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Cloudinary\Api\Admin\AdminApi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SaveImages;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class ProjectController extends Controller
{
    public $defaultImage = "https://res.cloudinary.com/dw8cxchqs/image/upload/v1697924077/Projects/no_image_w2tfeb.jpg";
    public function index()
    {
        $projects = Project::all();
        $data = [];
        foreach ($projects as $project) {
            $data[] = $this->getProjectData($project);
        }
        return view('dashboard/dashboard', ["data" => $data]);
    }

    public function create()
    {
        return view('/dashboard/dashboard');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->only('name', 'type', 'desc', 'code_site', 'live_site', 'fem_link', 'more_code', 'techs', 'checks'), [
                'name' => ['required', 'string', 'between:2,255', 'unique:projects,name'],
                'type' => ['required', 'numeric', 'between:1,4'],
                'desc' => ['required', 'string', 'between:2,128'],
                'code_site' => ['nullable', 'string', 'max:255', 'active_url'],
                'live_site' => ['nullable', 'string', 'max:255', 'active_url'],
                'fem_link' => ['nullable', 'string', 'max:255', 'active_url'],
                'more_code' => ['nullable', 'string', 'max:8000'],
                'techs' => ['required', 'array'],
                'techs.*' => ['required', 'string', 'max:20'],
                'checks' => ['required', 'array'],
                'checks.*' => ['required', 'boolean'],
            ]);
            if ($validator->fails())
                return redirect()->back()->withErrors($validator)->withInput();
            DB::beginTransaction();
            $project = Project::create([
                'name' => $request->name,
                'type' => $request->type,
                'desc' => $request->desc,
                'code_site' => $request->code_site,
                'live_site' => $request->live_site,
                'fem_link' => $request->fem_link,
                'more_code' => $request->more_code,
                'created_by' => auth()->id(),
            ]);
            //create Techs
            if ($request->techs)
                foreach ($request->techs as $tech) {
                    ProjectTech::firstOrCreate([
                        "project_id" => $project->id,
                        "tech" => Str::ucfirst($tech),
                    ]);
                }
            //create media
            foreach ($request->file('media') as $med) {
                $mimes = ['jpg', 'png', 'jpeg', 'svg', 'bmp', 'gif'];
                if (in_array($med->getClientOriginalExtension(), $mimes) && $med->getsize() <= 41943040) {
                    $destination_path = 'public/images/temp/' . $project->id;
                    $randomString = Str::random(30);
                    $media_name =  $randomString . $med->getClientOriginalName();
                    $path = $med->storeAs($destination_path, $media_name);
                }
            }

            dispatch(new SaveImages($destination_path, $request->checks, $project));
            DB::commit();
            return redirect('/dashboard/projects')->with(['success' => true, 'message' => 'Project Created successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['success' => false, 'message' => 'Failed to create new project!']);
        }
    }

    public function edit(Request $request)
    {
        if (!$project = Project::find($request->id)) return redirect()->back()->with(['success' => false, 'message' => "Not found"]);
        $data = $this->getProjectData($project);
        $data["media"] = $this->getProjectMedia($project);
        return view('/dashboard/dashboard', ["data" => $data]);
    }

    public function update(Request $request)
    {
        try {
            if (!$project = Project::find($request->id)) return redirect()->back()->with(['success' => false, 'message' => "Not found"]);
            $validator = Validator::make($request->only('name', 'type', 'desc', 'code_site', 'live_site', 'fem_link', 'more_code', 'techs', 'checks', 'edited_checks', 'delted_media'), [
                'name' => ['required', 'string', 'between:2,255', Rule::unique('projects', 'name')->ignore($project->id)],
                'type' => ['required', 'numeric', 'between:1,4'],
                'desc' => ['required', 'string', 'between:2,128'],
                'code_site' => ['nullable', 'string', 'max:255', 'active_url'],
                'live_site' => ['nullable', 'string', 'max:255', 'active_url'],
                'fem_link' => ['nullable', 'string', 'max:255', 'active_url'],
                'more_code' => ['nullable', 'string', 'max:8000'],
                'techs' => ['required', 'array'],
                'techs.*' => ['required', 'string', 'max:20'],
                'checks' => ['nullable', 'array'],
                'checks.*' => ['nullable', 'boolean'],
                'edited_checks' => ['nullable', 'array'],
                'edited_checks.id*' => ['required', 'exists:projects_media,id'],
                'edited_checks.check*' => ['required', 'boolean'],
                'deleted_media' => ['nullable', 'array'],
                'deleted_media.*' => ['required', 'exists:projects_media,id'],
            ]);
            if ($validator->fails())
                return redirect()->back()->withErrors($validator)->withInput();
            DB::beginTransaction();
            $request->name ? ($request->name != $project->name ? $project->name = $request->name : false) : false;
            $request->type ? ($request->type != $project->type ? $project->type = $request->type : false) : false;
            $request->desc ? ($request->desc != $project->desc ? $project->desc = $request->desc : false) : false;
            $request->exists('code_site') ? ($request->code_site != $project->code_site ? $project->code_site = $request->code_site : false) : false;
            $request->exists('live_site') ? ($request->live_site != $project->live_site ? $project->live_site = $request->live_site : false) : false;
            $request->exists('fem_link') ? ($request->fem_link != $project->fem_link ? $project->fem_link = $request->fem_link : false) : false;
            $request->exists('more_code') ? ($request->more_code != $project->more_code ? $project->more_code = $request->more_code : false) : false;
            //update Techs
            if ($request->techs)
                foreach ($request->techs as $tech) {
                    ProjectTech::firstOrCreate([
                        "project_id" => $project->id,
                        "tech" => Str::ucfirst($tech),
                    ]);
                    ProjectTech::query()->where("project_id", $project->id)->whereNotIn("tech", $request->techs)->delete();
                }
            //delete Images
            if ($request->deleted_media) {
                foreach ($request->deleted_media as $media) {
                    if ($media = ProjectMedia::where('id', $media)->first()) {
                        Cloudinary::destroy($media->public_id);
                        $media->delete();
                    }
                }
            }
            //Store Media
            if ($request->file('media')) {
                foreach ($request->file('media') as $med) {
                    $mimes = ['jpg', 'png', 'jpeg', 'svg', 'bmp', 'gif'];
                    if (in_array($med->getClientOriginalExtension(), $mimes) && $med->getsize() <= 41943040) {
                        $destination_path = 'public/images/temp/' . $project->id;
                        $randomString = Str::random(30);
                        $media_name =  $randomString . $med->getClientOriginalName();
                        $path = $med->storeAs($destination_path, $media_name);
                    }
                }
                dispatch(new SaveImages($destination_path, $request->checks, $project));
            }
            //Edit Checks
            if ($request->edited_checks) {
                foreach ($request->edited_checks as $check) {
                    if ($med_check = ProjectMedia::where('id', $check['id'])->first()) {
                        $med_check->in_main_page = $check['check'];
                        $med_check->save();
                    }
                }
            }
            $project->save();
            DB::commit();
            return redirect('/dashboard/projects')->with(['success' => true, 'message' => 'Project Updated successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['success' => false, 'message' => $e->getMessage()]);
            return redirect()->back()->with(['success' => false, 'message' => "Somthing went wrong!"]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            if (!$project = Project::find($request->id)) return redirect()->back()->with(['success' => false, 'message' => "Not found"]);
            DB::beginTransaction();
            $project->delete();
            $this->deleteFolder("Projects/" . $project->id);
            DB::commit();
            return redirect('/dashboard/projects')->with(['success' => true, 'message' => 'Project (' . $project->name . ") deleted successfully"]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['success' => false, 'message' => "Somthing went wrong!"]);
        }
    }

    public function getProjectData($project)
    {
        return [
            'id' => $project->id,
            'name' => $project->name,
            'type' => $project->type,
            'type_name' => $project->type == 1 ? "FrontEnd" : ($project->type == 2 ? "BackEnd" : ($project->type == 3 ? "Game" : "FullStack")),
            'desc' => $project->desc ?? "",
            'code_site' => $project->code_site ?? "",
            'live_site' => $project->live_site ?? "",
            'fem_link' => $project->fem_link ?? "",
            'more_code' => $project->more_code ?? "",
            'created_by' => $project->user->name,
            'created_at' => Carbon::parse($project->created_at)->format('Y-m-d H:i'),
            'img' => ProjectMedia::where(['project_id' => $project->id, 'in_main_page' => true])->first()->link ?? $this->defaultImage,
            'techs' => $this->getProjectTechs($project),
            'techs_array' => ProjectTech::where('project_id', $project->id)->pluck('tech')->toArray(),
        ];
    }

    public function getProjectTechs($project)
    {
        $techs = $project->techs;
        $techsArray = [];
        foreach ($techs as $tech) {
            $techsArray[] = [
                'id' => $tech->id,
                'tech' => $tech->tech
            ];
        }
        return $techsArray;
    }

    public function getProjectMedia($project)
    {
        $media = ProjectMedia::where(['project_id' => $project->id])->get();
        $data = [];
        foreach ($media as $med) {
            $data[] = [
                'id' => $med->id,
                'link' => $med->link ?? "",
                'in_main_page' => (bool)$med->in_main_page,
            ];
        }
        return $data;
    }

    public function deleteFolder($prefix)
    {
        try {
            $admin = new AdminApi();
            $admin->deleteAssetsByPrefix($prefix);
            $admin->deleteFolder($prefix);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
