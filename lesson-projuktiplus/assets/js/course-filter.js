jQuery(function ($) {

    function getFilters() {
        return {
            action: 'filter_courses',
            category: $('.all-courses-filter-category-input:checked').map(function () {
                return this.value;
            }).get(),
            level: $('.courses-filter:checked').map(function () {
                return this.value;
            }).get(),
            language: $('.filter-language:checked').map(function () {
                return this.value;
            }).get(),
        };
    }

    function updateCount() {
        let count = $('input[type="checkbox"]:checked').length;
        $('.active-filter-count').text(count + ' Filters Applied');
    }

    function loadCourses() {
        updateCount();

        $('.courses-all-wrapper').hide();
        $('.courses-skeleton').fadeIn(150);

        $.post(lessonlms_filter.ajax_url, getFilters(), function (response) {
            $('.courses-skeleton').hide();
            $('.courses-all-wrapper').html(response).fadeIn(200);
        });
    }

    $('input[type="checkbox"]').on('change', loadCourses);

    $('.clear-filters-btn').on('click', function () {
        $('input[type="checkbox"]').prop('checked', false);
        loadCourses();
    });

});
