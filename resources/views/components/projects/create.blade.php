<div class="project-form projects-create page">
    <div class="page-top-herf"><a href="/dashboard/projects"><i class="fa fa-arrow-left" aria-hidden="true"></i>
            &#160; &#160;Back</a></div>
    <br>
    <h2>Let's Create A New Masterpiece! 🤩</h2>
    <br>
    <div class="form-card">
        <form id="create-project-form" action="/dashboard/projects" method="POST" enctype="multipart/form-data">
            <div class="flex">
                <div>
                    <label for="name">Name</label>
                    <span>
                        <input type="text" name="name" id="name" placeholder="Project Name" value="{{ old('name') }}">
                    </span>
                    @error('name')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="type">Type <div class="input-info"
                            data-content="1 => FrontEnd | 2 => BackEnd | 3 => Game | 4 => FullStack"><i
                                class="fa fa-question" aria-hidden="true"></i>
                        </div></label>

                    <span>
                        <input type="number" name="type" id="type" min="1" max="4" placeholder="Project Type"
                            value="{{ old('type') }}">
                    </span>
                    @error('type')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="desc">Description</label>
                    <span>
                        <textarea name="desc" id="desc" cols="30" rows="2"
                            placeholder="A sentence or two 🤐">{{ old('desc') }}</textarea>
                    </span>
                    @error('desc')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="full-screen-input">
                    <label for="code_site">Code Site</label>
                    <span>
                        <input type="text" name="code_site" id="code_site" placeholder="Where you host project code"
                            value="{{ old('code_site') }}">
                    </span>
                    @error('code_site')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="full-screen-input">
                    <label for="live_site">Live Site</label>
                    <span>
                        <input type="text" name="live_site" id="live_site"
                            placeholder="Where people can see your project" value="{{ old('live_site') }}">
                    </span>
                    @error('live_site')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="full-screen-input">
                    <label for="fem_link">FrontEnd Mentor Link</label>
                    <span>
                        <input type="text" name="fem_link" id="fem_link" placeholder="FrontEnd Mentor Project Link"
                            value="{{ old('fem_link') }}">
                    </span>
                    @error('fem_link')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Project Techs --}}
                <div class="array-input-ui" data-lebalName="Tech" data-fieldName="techs[]" data-minFields='1'
                    data-maxFields='10' data-oldValues="{{json_encode(old('techs'))}}">
                    <p class=" array-title">Project techs <i class="fa fa-gears" aria-hidden="true"></i></p>
                    @error('techs.*')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                    @error('techs')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                    <button class="add-input" tabindex="0" aria-label="Add new input field"><i class="fa fa-plus"
                            aria-hidden="true"></i></button>
                </div>
                {{-- Project more section --}}
                <div class="full-screen-input more-code">
                    <p style="font-size: 20px; font-weight: bold;">More Section Code <i class="fa fa-code"
                            aria-hidden="true"></i></p>
                    <button class="more-section-btn">Create more section by code</button>
                    <span>
                        <input type="hidden" name="more_code" id="more_code" value="{{ old('more_code') }}">
                    </span>
                    @error('more_code')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Project Media --}}
                <div class="project-media">
                    <label for="media" style="font-size: 20px; font-weight: bold;">Upload images <i class="fa fa-upload"
                            aria-hidden="true"></i>
                        <div class="custom-upload-input" style="display: block">Upload</div>
                    </label>
                    <span>
                        <input type="file" class="media-input hidden" name="media[]" id="media"
                            accept=".jpg, .png, .jpeg, .svg, .bmp, .gif" multiple>
                    </span>
                    @error('media')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                    @error('checks')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                    <div class="thumbnails"></div>
                </div>
            </div>
            <button type="submit" data-task="CreateProject">
                <p>Create</p>
            </button>
            @csrf
            @honeypot
        </form>
    </div>
    <div class="more-sec-popup hidden">
        <button class="exit-popup" aria-label="close more info code popup">
            <i class="fa fa-close"></i>
        </button>
        <h2>Let's create the more section!</h2>
        <br>
        <div class="flex">
            <div class="code">
                <label for="more-code">Code <i class="fa fa-code" aria-hidden="true"></i></label>
                <textarea id="more-code" cols="30" rows="10"
                    placeholder="Code For the 'more' section">{{ old('more_code') }}</textarea>
            </div>
            <div class="result">
                <div class="moreInfo">
                    <button class="exit" aria-label="close the more info menu"><i class="fa fa-close"></i></button>
                    <div class="content">
                    </div>
                </div>
            </div>
        </div>
        <button class="generate-code" aria-label="Generate code in JSON form">
            Generate <i class="fas fa-marker"></i>
        </button>
    </div>
</div>