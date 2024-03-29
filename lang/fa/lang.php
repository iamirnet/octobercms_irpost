<?php return [
    'plugin' => [
        'name' => 'سرویس پست',
        'description' => 'سیستم  سرویس پست',
        'tab' => 'سرویس پست',
        'access_irpost' => 'مدیریت سرویس پست',
    ],
    'irpost' => [
        'title' => 'سرویس پست',
        'description' => 'تظیمات سرویس پست',
        'irpost_type' => 'نوع سرویس پست',
        'none' => 'هیچ کدام',
        'smart' => 'هوشمند',
        'pishtaz' => 'پست پیشتاز',
        'custom' => 'پست سفارشی',
        'tax_rate' => 'نرخ مالیات',
        'id_price' => 'مبلغ شناسه الکترونیک (تومان)',
        'fine_price' => 'مبلغ تعهد غرامت اجباری (تومان)',
        'ads_price' => 'آگهی تحویل الکترونیک (تومان)',
        'packaging_price' => 'مبلغ بسته بندی (تومان)',
        'insurance_price' => 'مبلغ بیمه (تومان)',
        'free'            => 'حداقل مبلغ خرید جهت ارسال رایگان (ریال)',
    ],
    'locations' => [
        'state' => [
            'cities' => [
                'title' => 'شهر ها',
                'create' => 'افزودن شهر',
                'edit' => 'ویرایش شهر',
                'delete' => 'می خواهید حذف کنید؟',
                'fields' => [
                    'name' => 'نام شهر',
                    'name_comment' => 'نام شهر را جهت نمایش وارد نمایید.',
                    'code' => 'کد شهر',
                    'code_comment' => 'کد یکتایی جهت دسترسی به این شهر وارد نمایید.',
                    'pishtaz_500' => 'پست پیشتاز تا 500 گرم',
                    'pishtaz_comment_500' => 'هزینه پست پیشتاز تا 500 گرم',
                    'pishtaz_1000' => 'پست پیشتاز تا 1000 گرم',
                    'pishtaz_comment_1000' => 'هزینه پست پیشتاز از 501 گرم تا 1000 گرم',
                    'pishtaz_2000' => 'پست پیشتاز تا 2000 گرم',
                    'pishtaz_comment_2000' => 'هزینه پست پیشتاز از 1001 گرم تا 2000 گرم',
                    'pishtaz_up' => 'پست پیشتاز از 2000 گرم',
                    'pishtaz_comment_up' => 'هزینه پست پیشتاز از 2000 گرم به ازای هر کیلوگرم',
                    'custom_500' => 'پست سفارشی تا 500 گرم',
                    'custom_comment_500' => 'هزینه پست سفارشی تا 500 گرم',
                    'custom_1000' => 'پست سفارشی تا 1000 گرم',
                    'custom_comment_1000' => 'هزینه پست سفارشی از 501 گرم تا 1000 گرم',
                    'custom_2000' => 'پست سفارشی تا 2000 گرم',
                    'custom_comment_2000' => 'هزینه پست سفارشی از 1001 گرم تا 2000 گرم',
                    'custom_up' => 'پست سفارشی از 2000 گرم',
                    'custom_comment_up' => 'هزینه پست سفارشی از 2000 گرم به ازای هر کیلوگرم',
                ],
                'btn' => [
                    'save' => 'ذخیره',
                    'cancel' => 'لغو',
                    'edit' => 'ویرایش',
                    'delete' => 'حذف',
                ]
            ]
        ]
    ]
];
