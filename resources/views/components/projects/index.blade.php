<div class="projects page">
    <div class="page-top-herf"><a href="/dashboard/projects/create"><i class="fa fa-plus" aria-hidden="true"></i></i>
            &#160; &#160;Create</a></div>
    <div class="flex">
        @foreach ($data as $project)
        <div class="project-card" data-id={{$project['id']}} style="background-image: url({{$project['img']}})">
            <button class="confirm-call-btn remove project-remove-btn"
                data-title="Delete ({{ $project['name'] }}) project ?"
                data-message="Are you sure you want to delete ( {{ $project['name'] }} ) from your projects list?"
                data-backMessage='Cancel' data-backClass='blue' data-formMessage="DELETE" data-formClass="red"
                data-formAction="/dashboard/projects/{{ $project['id'] }}"><i class="fa fa-trash"
                    aria-description="Delete admin"></i></button>
            <a href="/dashboard/projects/edit/{{$project['id']}}" class="overlay-link"></a>
            <div class="info">
                <div class="static-data">
                    <div class="name">Name : {{Str::ucfirst($project['name'])}}</div>
                    <div class="type">Type : {{$project['type_name']}}</div>
                    <div class="desc">Description : {{Str::ucfirst($project['desc'])}}</div>
                </div>
                <div class="techs"> Techs used :
                    <ul>
                        @foreach ($project['techs'] as $tech)
                        <li class="tag {{$tech['tech']}}Tag">{{$tech['tech']}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="links">
                    @if ($project['code_site'] || $project['live_site'] || $project['fem_link'] ||
                    $project['more_code'])
                    <p style="">Links : </p>
                    @endif
                    <ul>
                        @if ($project['code_site'])
                        <li><a class="inner-link link-btn" href="{{$project['code_site']}}" target="_blank"
                                rel="noopener noreferrer">Code</a></li>
                        @endif
                        @if ($project['live_site'])
                        <li><a class="inner-link link-btn" href="{{$project['live_site']}}" target="_blank"
                                rel="noopener noreferrer">Live</a></li>
                        @endif
                        @if ($project['fem_link'])
                        <li><a class="inner-link link-btn" href="{{$project['fem_link']}}" target="_blank"
                                rel="noopener noreferrer">FEM</a></li>
                        @endif
                        @if ($project['more_code'])
                        <li><button class="inner-link link-btn more-btn"
                                data-value="{{$project['more_code']}}">More</button>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
<div class="moreInfo hidden">
    <button class="exit" aria-label="close the more info menu"><i class="fa fa-close"></i></button>
    <div class="content">
    </div>
</div>