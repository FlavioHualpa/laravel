<div>
    @switch($currentPage)
    
        @case('main')
            <x-survey.main />
        @break
        
        @case('section')
            <x-survey.section
            :currentSection="$currentSection"
            :isCurrentSectionLast="$this->isCurrentSectionLast"
            :questions="$this->questionsInCurrentSection"
            :showAlert="$showAlert"
            :alertMessage="$alertMessage"
            />
        @break
        
        @default
        
    @endswitch    
</div>
