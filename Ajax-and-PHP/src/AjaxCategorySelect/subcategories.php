<?php

$categories = [
    [
        'id' => 1,
        'name' => 'Furniture',
        'subcategories' => [
            [
                'id' => 1,
                'name' => 'Beds',
            ],
            [
                'id' => 2,
                'name' => 'Benches',
            ],
            [
                'id' => 3,
                'name' => 'Cabinets',
            ],
            [
                'id' => 4,
                'name' => 'Chairs & Stools',
            ],
            [
                'id' => 5,
                'name' => 'Consoles & Desks',
            ],
            [
                'id' => 6,
                'name' => 'Sofas',
            ],
            [
                'id' => 7,
                'name' => 'Tables',
            ],
        ],
    ],
    [
        'id' => 2,
        'name' => 'Lighting',
        'subcategories' => [
            [
                'id' => 1,
                'name' => 'Ceiling',
            ],
            [
                'id' => 2,
                'name' => 'Floor',
            ],
            [
                'id' => 3,
                'name' => 'Table',
            ],
            [
                'id' => 4,
                'name' => 'Wall',
            ],
        ],
    ],
    [
        'id' => 3,
        'name' => 'Accessories',
        'subcategories' => [
            [
                'id' => 1,
                'name' => 'Mirrors',
            ],
            [
                'id' => 2,
                'name' => 'Outdoor & Patio',
            ],
            [
                'id' => 3,
                'name' => 'Pillows',
            ],
            [
                'id' => 4,
                'name' => 'Rugs',
            ],
            [
                'id' => 4,
                'name' => 'Wall Decor & Art',
            ],
        ],
    ],
];

$categoryId = isset($_GET['category_id']) ? (int) $_GET['category_id'] : 0;
foreach ($categories as $category) {
    if ($category['id'] === $categoryId) {
        $subcategories = $category['subcategories'];
        foreach ($subcategories as $subcategory) {
            echo "<option value=\"{$subcategory['id']}\">";
            echo $subcategory['name'];
            echo "</option>";
        }
    }
}