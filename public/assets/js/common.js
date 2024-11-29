$(".state-select2").select2({
    placeholder: "Select State", ajax: {
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/state-list',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                searchTerm: params.term,
            };
        }, processResults: function (response) {
            return {results: response};
        }, cache: true
    }
});


$(".state-select2").change(function () {
    let stateID = $(this).val();
    $(".district-select2").select2({
        placeholder: "Select District", ajax: {
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/district-list',
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    searchTerm: params.term,
                    state_id: stateID,
                };
            }, processResults: function (response) {
                return {results: response};
            }, cache: true
        }
    });
});

$(".state-select2").change(function () {
    let stateID = $(this).val();
    $(".district-select2").change(function () {
        let districtID = $(this).val();
        $(".city-select2").select2({
            placeholder: "Select City", ajax: {
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/city-list',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term,
                        state_id: stateID,
                        district_id: districtID,
                    };
                }, processResults: function (response) {
                    return {results: response};
                }, cache: true
            }
        });
    });
});

$(".city-select2").change(function () {
    let cityId = $(this).val();
    $(".pincode-select2").select2({
        placeholder: "Select PinCode", ajax: {
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/pincode-list',
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    searchTerm: params.term,
                    city_id: cityId,
                };
            }, processResults: function (response) {
                return {results: response};
            }, cache: true
        }
    });
});





