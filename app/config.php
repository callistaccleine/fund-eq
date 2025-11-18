<?php
return [
    'supabase' => [
        'url' => getenv('SUPABASE_URL') ?: 'https://your-project.supabase.co',
        'key' => getenv('SUPABASE_SERVICE_KEY') ?: 'service-key-placeholder',
        'table' => 'tasks',
    ],
];
