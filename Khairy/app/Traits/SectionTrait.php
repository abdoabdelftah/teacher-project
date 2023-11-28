<?php

namespace App\Traits;

use App\Models\Lessonsection;
use App\Models\Studentlessonsectionfollowup;
use Illuminate\Support\Facades\File;

trait  SectionTrait
{
    function checkGate($grade_id, $unit_id, $lesson_id, $lesson_section_id)
    {

        $section = Lessonsection::where('id', $lesson_section_id)->first();
        $block = Lessonsection::where('lesson_id', $lesson_id)->where('hide', 0)->where('priority', '<', $section->priority)->where('block', 1)->first();

        if ($block) {

            $student_done = Studentlessonsectionfollowup::where('lesson_section_id', $block->id)->where('student_id', auth()->user()->id)->where('done', 1)->first();

            if (!$student_done) {

                if ($block->section_type == 1 || $block->section_type == 2) {

                    return  '/grade/' . $grade_id . '/unit/' . $unit_id . '/lesson/' . $lesson_id . '/lessonsectionexam/' . $block->id;
                } elseif ($block->section_type == 3) {

                    return  '/grade/' . $grade_id . '/unit/' . $unit_id . '/lesson/' . $lesson_id . '/lessonsectiontextexam/' . $block->id;
                } elseif ($block->section_type == 4) {

                    return  '/grade/' . $grade_id . '/unit/' . $unit_id . '/lesson/' . $lesson_id . '/pdfexam/' . $block->id;
                } elseif ($block->section_type == 5) {

                    return  '/grade/' . $grade_id . '/unit/' . $unit_id . '/lesson/' . $lesson_id . '/lessonsectionlecture/' . $block->id;
                }
            }
        }


        //end function
    }
}
