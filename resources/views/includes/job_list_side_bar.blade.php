<div class="sidebar-shadow none-shadow mb-30">
    <input type="hidden" name="search" value="{{Request::get('search', '')}}" />

    <div class="sidebar-filters">
        {{-- <div class="filter-block mb-30">
            <h5 class="medium-heading mb-15">Location</h5>
            <div class="form-group">
                <input type="text" class="form-control form-icons" placeholder="Location" />
                <i class="fi-rr-marker"></i>
            </div>
        </div>
        <div class="filter-block mb-30">
            <h5 class="medium-heading mb-15">Categoy</h5>
            <div class="form-group select-style select-style-icon">
                <select class="form-control form-icons select-active">
                    <option>Ui/UX design</option>
                    <option>Ui/UX design 1</option>
                    <option>Ui/UX design 2</option>
                    <option>Ui/UX design 3</option>
                </select>
                <i class="fi-rr-briefcase"></i>
            </div>
        </div>  --}}
        <div class="filter-block mb-30">
            <h5 class="medium-heading mb-15">{{__('Jobs By Title')}}</h5>
            <div class="form-group">
                <ul class="list-checkbox view_more_ul optionlist">
                    @if(isset($jobTitlesArray) && count($jobTitlesArray))
                    @foreach($jobTitlesArray as $key=>$jobTitle)
                    <li>
                        @php
                        $checked = (in_array($jobTitle, Request::get('job_title', array())))? 'checked="checked"':'';
                        @endphp
                        <label class="cb-container" for="job_title_{{$key}}">
                            <input type="checkbox" name="job_title[]" id="job_title_{{$key}}" value="{{$jobTitle}}" {{$checked}}>
                            {{$jobTitle}} <span class="text-small">
                            </span>
                            <span class="checkmark"></span>
                        </label>
                        <span class="number-item">{{App\Job::countNumJobs('title', $jobTitle)}}</span>
                    </li>
                    @endforeach
                    @endif
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>

            </div>
        </div>
        <div class="filter-block mb-30">
            <h5 class="medium-heading mb-10">{{__('Jobs By Country')}}</h5>
            <div class="form-group">
                <ul class="list-checkbox optionlist view_more_ul">
                    @if(isset($countryIdsArray) && count($countryIdsArray))
                    @foreach($countryIdsArray as $key=>$country_id)
                    @php
                    $country = App\Country::where('country_id','=',$country_id)->lang()->active()->first();
                    @endphp
                    @if(null !== $country)
                    @php
                    $checked = (in_array($country->country_id, Request::get('country_id', array())))? 'checked="checked"':'';
                    @endphp
                    <li>
                        <label class="cb-container" for="country_{{$country->country_id}}">
                            <input type="checkbox" name="country_id[]" id="country_{{$country->country_id}}" value="{{$country->country_id}}" {{$checked}}>
                            <span class="text-small"> {{$country->country}}</span>
                            <span class="checkmark"></span>
                        </label>
                        <span class="number-item">{{App\Job::countNumJobs('country_id', $country->country_id)}}</span>
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
            </div>
        </div>
        <div class="filter-block mb-30">
            <h5 class="medium-heading mb-10">{{__('Jobs By State')}}</h5>
            <div class="form-group">
                <ul class="list-checkbox optionlist view_more_ul">
                    @if(isset($stateIdsArray) && count($stateIdsArray))
                    @foreach($stateIdsArray as $key=>$state_id)
                    @php
                    $state = App\State::where('state_id','=',$state_id)->lang()->active()->first();
                    @endphp
                    @if(null !== $state)
                    @php
                    $checked = (in_array($state->state_id, Request::get('state_id', array())))? 'checked="checked"':'';
                    @endphp
                    <li>
                        <label class="cb-container" for="state_{{$state->state_id}}">
                            <input type="checkbox" name="state_id[]" id="state_{{$state->state_id}}" value="{{$state->state_id}}" {{$checked}}>
                            <span class="text-small"> {{$state->state}}</span>
                            <span class="checkmark"></span>
                        </label>
                        <span class="number-item">{{App\Job::countNumJobs('state_id', $state->state_id)}}</span>
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
            </div>
        </div>
        <div class="filter-block mb-30">
            <h5 class="medium-heading mb-10">{{__('Jobs By City')}}</h5>
            <div class="form-group">
                <ul class="list-checkbox optionlist view_more_ul">
                    @if(isset($cityIdsArray) && count($cityIdsArray))
                    @foreach($cityIdsArray as $key=>$city_id)
                    @php
                    $city = App\City::where('city_id','=',$city_id)->lang()->active()->first();
                    @endphp
                    @if(null !== $city)
                    @php
                    $checked = (in_array($city->city_id, Request::get('city_id', array())))? 'checked="checked"':'';
                    @endphp
                    <li>
                        <label class="cb-container" for="city_{{$city->city_id}}">
                            <input type="checkbox" name="city_id[]" id="city_{{$city->city_id}}" value="{{$city->city_id}}" {{$checked}}>
                            <span class="text-small"> {{$city->city}}</span>
                            <span class="checkmark"></span>
                        </label>
                        <span class="number-item">{{App\Job::countNumJobs('city_id', $city->city_id)}}</span>
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
            </div>
        </div>
        <div class="filter-block mb-30">
            <h5 class="medium-heading mb-10">{{__('Jobs By Experience')}}</h5>
            <div class="form-group">
                <ul class="list-checkbox optionlist view_more_ul">
                    @if(isset($jobExperienceIdsArray) && count($jobExperienceIdsArray))
                    @foreach($jobExperienceIdsArray as $key=>$job_experience_id)
                    @php
                    $jobExperience = App\JobExperience::where('job_experience_id','=',$job_experience_id)->lang()->active()->first();
                    @endphp
                    @if(null !== $jobExperience)
                    @php
                    $checked = (in_array($jobExperience->job_experience_id, Request::get('job_experience_id', array())))? 'checked="checked"':'';
                    @endphp
                    <li>
                        <label class="cb-container" for="job_experience_{{$jobExperience->job_experience_id}}">
                            <input type="checkbox" name="job_experience_id[]" id="job_experience_{{$jobExperience->job_experience_id}}" value="{{$jobExperience->job_experience_id}}" {{$checked}}>
                            <span class="text-small"> {{$jobExperience->job_experience}}</span>
                            <span class="checkmark"></span>
                        </label>
                        <span class="number-item">{{App\Job::countNumJobs('job_experience_id', $jobExperience->job_experience_id)}}</span>
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
            </div>
        </div>
        <div class="filter-block mb-30">
            <h5 class="medium-heading mb-10">{{__('Jobs By Job Type')}}</h5>
            <div class="form-group">
                <ul class="list-checkbox optionlist view_more_ul">
                    @if(isset($jobTypeIdsArray) && count($jobTypeIdsArray))
                    @foreach($jobTypeIdsArray as $key=>$job_type_id)
                    @php
                    $jobType = App\JobType::where('job_type_id','=',$job_type_id)->lang()->active()->first();
                    @endphp
                    @if(null !== $jobType)
                    @php
                    $checked = (in_array($jobType->job_type_id, Request::get('job_type_id', array())))? 'checked="checked"':'';
                    @endphp
                    <li>
                        <label class="cb-container" for="job_type_{{$jobType->job_type_id}}">
                            <input type="checkbox" name="job_type_id[]" id="job_type_{{$jobType->job_type_id}}" value="{{$jobType->job_type_id}}" {{$checked}}>
                            <span class="text-small"> {{$jobType->job_type}} </span>
                            <span class="checkmark"></span>
                        </label>
                        <span class="number-item">{{App\Job::countNumJobs('job_type_id', $jobType->job_type_id)}}</span>
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
            </div>
        </div>

        <div class="filter-block mb-30">
            <h5 class="medium-heading mb-10">{{__('Jobs By Job Shift')}}</h5>
            <div class="form-group">
                <ul class="list-checkbox optionlist view_more_ul">
                    @if(isset($jobShiftIdsArray) && count($jobShiftIdsArray))
                    @foreach($jobShiftIdsArray as $key=>$job_shift_id)
                    @php
                    $jobShift = App\JobShift::where('job_shift_id','=',$job_shift_id)->lang()->active()->first();
                    @endphp
                    @if(null !== $jobShift)
                    @php
                    $checked = (in_array($jobShift->job_shift_id, Request::get('job_shift_id', array())))? 'checked="checked"':'';
                    @endphp
                    <li>
                        <label class="cb-container" for="job_shift_{{$jobShift->job_shift_id}}">
                            <input type="checkbox" name="job_shift_id[]" id="job_shift_{{$jobShift->job_shift_id}}" value="{{$jobShift->job_shift_id}}" {{$checked}}>
                            <span class="text-small"> {{$jobType->job_type}} </span>
                            <span class="checkmark"></span>
                        </label>
                        <span class="number-item">{{App\Job::countNumJobs('job_shift_id', $jobShift->job_shift_id)}}</span>
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
            </div>
        </div>

        <div class="filter-block mb-30">
            <h5 class="medium-heading mb-10">{{__('Jobs By Career Level')}}</h5>
            <div class="form-group">
                <ul class="list-checkbox optionlist view_more_ul">
                    @if(isset($careerLevelIdsArray) && count($careerLevelIdsArray))
                    @foreach($careerLevelIdsArray as $key=>$career_level_id)
                    @php
                    $careerLevel = App\CareerLevel::where('career_level_id','=',$career_level_id)->lang()->active()->first();
                    @endphp
                    @if(null !== $careerLevel)
                    @php
                    $checked = (in_array($careerLevel->career_level_id, Request::get('career_level_id', array())))? 'checked="checked"':'';
                    @endphp
                    <li>
                        <label class="cb-container" for="career_level_{{$careerLevel->career_level_id}}">
                            <input type="checkbox" name="career_level_id[]" id="career_level_{{$careerLevel->career_level_id}}" value="{{$careerLevel->career_level_id}}" {{$checked}}>
                            <span class="text-small"> {{$careerLevel->career_level}}</span>
                            <span class="checkmark"></span>
                        </label>
                        <span class="number-item">{{App\Job::countNumJobs('career_level_id', $careerLevel->career_level_id)}}</span>
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
            </div>
        </div>

        <div class="filter-block mb-30">
            <h5 class="medium-heading mb-10">{{__('Jobs By Degree Level')}}</h5>
            <div class="form-group">
                <ul class="list-checkbox optionlist view_more_ul">
                    @if(isset($degreeLevelIdsArray) && count($degreeLevelIdsArray))
                    @foreach($degreeLevelIdsArray as $key=>$degree_level_id)
                    @php
                    $degreeLevel = App\DegreeLevel::where('degree_level_id','=',$degree_level_id)->lang()->active()->first();
                    @endphp
                    @if(null !== $degreeLevel)
                    @php
                    $checked = (in_array($degreeLevel->degree_level_id, Request::get('degree_level_id', array())))? 'checked="checked"':'';
                    @endphp
                    <li>
                        <label class="cb-container" for="degree_level_{{$degreeLevel->degree_level_id}}">
                            <input type="checkbox" name="degree_level_id[]" id="degree_level_{{$degreeLevel->degree_level_id}}" value="{{$degreeLevel->degree_level_id}}" {{$checked}}>
                            <span class="text-small"> {{$degreeLevel->degree_level}}</span>
                            <span class="checkmark"></span>
                        </label>
                        <span class="number-item">{{App\Job::countNumJobs('degree_level_id', $degreeLevel->degree_level_id)}}</span>
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
            </div>
        </div>

        <div class="filter-block mb-30">
            <h5 class="medium-heading mb-10">{{__('Jobs By Gender')}}</h5>
            <div class="form-group">
                <ul class="list-checkbox optionlist view_more_ul">
                    @if(isset($genderIdsArray) && count($genderIdsArray))
                    @foreach($genderIdsArray as $key=>$gender_id)
                    @php
                    $gender = App\Gender::where('gender_id','=',$gender_id)->lang()->active()->first();
                    @endphp
                    @if(null !== $gender)
                    @php
                    $checked = (in_array($gender->gender_id, Request::get('gender_id', array())))? 'checked="checked"':'';
                    @endphp
                    <li>
                        <label class="cb-container" for="gender_{{$gender->gender_id}}">
                            <input type="checkbox" name="gender_id[]" id="gender_{{$gender->gender_id}}" value="{{$gender->gender_id}}" {{$checked}}>
                            <span class="text-small"> {{$gender->gender}}</span>
                            <span class="checkmark"></span>
                        </label>
                        <span class="number-item">{{App\Job::countNumJobs('gender_id', $gender->gender_id)}}</span>
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
            </div>
        </div>
        <div class="filter-block mb-30">
            <h5 class="medium-heading mb-10">{{__('Jobs By Industry')}}</h5>
            <div class="form-group">
                <ul class="list-checkbox optionlist view_more_ul">
                    @if(isset($industryIdsArray) && count($industryIdsArray))
                    @foreach($industryIdsArray as $key=>$industry_id)
                    @php
                    $industry = App\Industry::where('id','=',$industry_id)->lang()->active()->first();
                    @endphp
                    @if(null !== $industry)
                    @php
                    $checked = (in_array($industry->id, Request::get('industry_id', array())))? 'checked="checked"':'';
                    @endphp
                    <li>
                        <label class="cb-container" for="industry_{{$industry->id}}">
                            <input type="checkbox" name="industry_id[]" id="industry_{{$industry->id}}" value="{{$industry->id}}" {{$checked}}>
                            <span class="text-small"> {{$industry->industry}}</span>
                            <span class="checkmark"></span>
                        </label>
                        <span class="number-item">{{App\Job::countNumJobs('industry_id', $industry->id)}}</span>
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
            </div>
        </div>
        <div class="filter-block mb-30">
            <h5 class="medium-heading mb-10">{{__('Jobs By Skill')}}</h5>
            <div class="form-group">
                <ul class="list-checkbox optionlist view_more_ul">
                    @if(isset($skillIdsArray) && count($skillIdsArray))
                    @foreach($skillIdsArray as $key=>$job_skill_id)
                    @php
                    $jobSkill = App\JobSkill::where('job_skill_id','=',$job_skill_id)->lang()->active()->first();
                    @endphp
                    @if(null !== $jobSkill)

                    @php
                    $checked = (in_array($jobSkill->job_skill_id, Request::get('job_skill_id', array())))? 'checked="checked"':'';
                    @endphp
                    <li>
                        <label class="cb-container" for="job_skill_{{$jobSkill->job_skill_id}}">
                            <input type="checkbox" name="job_skill_id[]" id="job_skill_{{$jobSkill->job_skill_id}}" value="{{$jobSkill->job_skill_id}}" {{$checked}}>
                            <span class="text-small"> {{$jobSkill->job_skill}}</span>
                            <span class="checkmark"></span>
                        </label>
                        <span class="number-item">{{App\Job::countNumJobs('job_skill_id', $jobSkill->job_skill_id)}}</span>
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
            </div>
        </div>
        <div class="filter-block mb-30">
            <h5 class="medium-heading mb-10">{{__('Jobs By Functional Areas')}}</h5>
            <div class="form-group">
                <ul class="list-checkbox optionlist view_more_ul">
                    @if(isset($functionalAreaIdsArray) && count($functionalAreaIdsArray))
                    @foreach($functionalAreaIdsArray as $key=>$functional_area_id)
                    @php
                    $functionalArea = App\FunctionalArea::where('functional_area_id','=',$functional_area_id)->lang()->active()->first();
                    @endphp
                    @if(null !== $functionalArea)
                    @php
                    $checked = (in_array($functionalArea->functional_area_id, Request::get('functional_area_id', array())))? 'checked="checked"':'';
                    @endphp
                    <li>
                        <label class="cb-container" for="functional_area_id_{{$functionalArea->functional_area_id}}">
                            <input type="checkbox" name="functional_area_id[]" id="functional_area_id_{{$functionalArea->functional_area_id}}" value="{{$functionalArea->functional_area_id}}" {{$checked}}>
                            <span class="text-small">{{$functionalArea->functional_area}} </span>
                            <span class="checkmark"></span>
                        </label>
                        <span class="number-item">{{App\Job::countNumJobs('functional_area_id', $functionalArea->functional_area_id)}}</span>
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
            </div>
        </div>
        <div class="filter-block mb-30">
            <h5 class="medium-heading mb-10">{{__('Jobs By Company')}}</h5>
            <div class="form-group">
                <ul class="list-checkbox optionlist view_more_ul">
                    @if(isset($companyIdsArray) && count($companyIdsArray))
                    @foreach($companyIdsArray as $key=>$company_id)
                    @php
                    $company = App\Company::where('id','=',$company_id)->active()->first();
                    @endphp
                    @if(null !== $company)
                    @php
                    $checked = (in_array($company->id, Request::get('company_id', array())))? 'checked="checked"':'';
                    @endphp
                    <li>
                        <label class="cb-container" for="company_{{$company->id}}">
                            <input type="checkbox" name="company_id[]" id="company_{{$company->id}}" value="{{$company->id}}" {{$checked}}>
                            <span class="text-small"> {{$company->name}} </span>
                            <span class="checkmark"></span>
                        </label>
                        <span class="number-item">{{App\Job::countNumJobs('company_id', $company->id)}}</span>
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
            </div>
        </div>
        <div class="filter-block mb-40">
            <h5 class="medium-heading mb-25">{{__('Salary Range')}}</h5>
            <div class="form-group">
                {!! Form::number('salary_from', Request::get('salary_from', null), array('class'=>'form-control', 'id'=>'salary_from', 'placeholder'=>__('Salary From'))) !!}
            </div>
            <div class="form-group mt-3">
                {!! Form::number('salary_to', Request::get('salary_to', null), array('class'=>'form-control', 'id'=>'salary_to', 'placeholder'=>__('Salary To'))) !!}
            </div>
            <div class="form-group mt-3">
                {!! Form::select('salary_currency', ['' =>__('Select Salary Currency')]+$currencies, Request::get('salary_currency'), array('class'=>'form-control', 'id'=>'salary_currency')) !!}
            </div>
            <!-- Salary end -->


        </div>
        <div class="buttons-filter">
            <button class="btn btn-default" type="submit">Apply filter</button>
            <button class="btn" id="reset-filters">Reset filter</button>
        </div>
    </div>
</div>
