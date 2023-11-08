<?php

namespace App\Jobs;

use App\Models\ProjectMedia;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Cloudinary\Api\Admin\AdminApi;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class SaveImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $path, $checks, $project;
    public function __construct($path, $checks, $project)
    {
        $this->path = $path;
        $this->checks = $checks;
        $this->project = $project;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $counter = 0;
        $files = Storage::allFiles($this->path);
        if ($files)
            foreach ($files as $med) {
                //
                $mimes = ['jpg', 'png', 'jpeg', 'svg', 'bmp', 'gif'];
                $med = new \Symfony\Component\HttpFoundation\File\File(storage_path("app/" . $med));
                if (in_array($med->getExtension(), $mimes) && $med->getSize() <= 41943040) {
                    $imgData = Cloudinary::upload($med->getRealPath(), [
                        'folder' => 'Projects/' . $this->project->id,
                    ]);
                    ProjectMedia::create([
                        'project_id' => $this->project->id,
                        'mime' => $med->getExtension(),
                        'in_main_page' => (bool)$this->checks[$counter] ?? false,
                        'link' => $imgData->getSecurePath(),
                        'public_id' => $imgData->getPublicId(),
                        'asset_id' => $imgData->getAssetId(),
                    ]);
                }
                $counter += 1;
            }
        Storage::deleteDirectory($this->path);
    }
}
