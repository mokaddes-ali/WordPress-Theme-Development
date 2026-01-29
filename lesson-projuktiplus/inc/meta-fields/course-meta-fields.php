<?php
/**
 * Courses meta fields
 * 
 * @package lessonlms
 */

function lessonlms_get_course_meta_fields() {
    return array(
        'course_details' => array(
            'vedio_hourse'       => array(
                'label' => 'Vedio Hours',
                'type'  => 'number',
                'step'  => '0.1',
                'required' => true,
            ),
            'downlable_resource' => array(
                'label' => 'Downlable Resource',
                'type'  => 'number',
                'step'  => '1',
                'required' => true,
            ),
            'total_articles' => array(
                'label' => 'Total Articles',
                'type'  => 'number',
                'required' => true,
            ),
            'language' => array(
                'label' => 'Course Language',
                'type'  => 'text',
                'required' => true,
            ),
            'sub_title_language' => array(
                'label' => 'Sub Title Language',
                'type'  => 'text',
            ),
        ),

        'pricing' => array(
            'regular_price' => array(
                'label' => 'Regular Price',
                'type'  => 'number',
                'step'  => '0.01',
                'required' => true,
            ),
            'original_price' => array(
                'label' => 'Original Price',
                'type'  => 'number',
                'step'  => '0.01',
                'required' => true,
            ),
        ),
         'course_extra_sections' => array(
            'course_learn_point' => array(
                'label' => 'What you’ll learn',
                'type'  => 'textarea',
                'rows'  => 6,
                'required' => true,
            ),
            'course_requirement_points' => array(
                'label' => 'Requirements',
                'type'  => 'textarea',
                'rows'  => 6,
                'required' => true,
            ),
            'who_this_course_for' => array(
                'label' => 'Who this course is for',
                'type'  => 'textarea',
                'rows'  => 6,
                'required' => true,
            ),
         ),
    );

}