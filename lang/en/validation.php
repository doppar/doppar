<?php

return [
    'required' => 'The :attribute field is required',
    'email' => 'The :attribute must be a valid email address.',
    'min' => [
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'max' => [
        'string' => 'The :attribute may not be greater than :max characters.',
    ],
    'unique' => 'The :attribute has already been taken.',
    'date' => 'The :attribute is not a valid date.',
    'gte' => 'The :attribute must be greater than or equal to :date.',
    'lte' => 'The :attribute must be less than or equal to :date.',
    'gt' => 'The :attribute must be greater than :date.',
    'lt' => 'The :attribute must be less than :date.',
    'int' => 'The :attribute must be an integer.',
    'float' => 'The :attribute must be a float with :decimal decimal places.',
    'between' => 'The :attribute must be between :min and :max.',
    'same_as' => 'The :attribute must match :other.',
    'file' => [
        'required' => 'The :attribute file is required.',
        'image' => 'The :attribute must be an image.',
        'mimes' => 'The :attribute must be a file of type: :values.',
        'dimensions' => [
            'min_width' => 'The :attribute must have a minimum width of :min_width pixels.',
            'min_height' => 'The :attribute must have a minimum height of :min_height pixels.',
            'max_width' => 'The :attribute must have a maximum width of :max_width pixels.',
            'max_height' => 'The :attribute must have a maximum height of :max_height pixels.',
        ],
        'max' => 'The :attribute may not be greater than :max kilobytes.',
    ]
];
