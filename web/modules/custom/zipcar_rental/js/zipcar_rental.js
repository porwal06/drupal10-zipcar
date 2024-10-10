(function ($, Drupal) {
    Drupal.behaviors.zipcarRental = {
        attach: function (context, settings) {
            once('zipcar-rental', 'body', context).forEach(function () {
                const $form = $('#zipcar-rental-form');
                const $results = $('#zipcar-rental-results');
                const URL = drupalSettings.path.baseUrl;
                //persist api data
                let api_data = null;

                function updateResults(data) {
                    $results.empty();
                    data.forEach(function (car) {
                        let trip_estimate = (car.estimate > 0) ? '<span>'+Drupal.t('Trip Estimate: ') + '</span>$' + car.estimate : ''
                        const $item = $('<div class="car-item"></div>');
                        $item.append(`<div class="image-title">
                    <h2>${car.title}, <span>${car.type}</span></h2>
                    <img src="${car.image}" alt="${car.title}">
                </div>`);
                        $item.append(`
                    <div class="details">
                    <p class="required-tag">${Drupal.t('Mobile App Required')} →</p>
                    <div class="car_price">
                    <span>${Drupal.t('Starting at')}</span>
                    <div>$${car.perHourCost} / hr</div>
                    <span>$${car.perDayCost}/day</span>
                    <p class="estimate">${trip_estimate}</p>
                    <button class="select-car">${Drupal.t('Select car')}</button>
                    </div>`);
                        $results.append($item);
                    });
                }

                function fetchCars() {
                    const search = $('#zipcar-rental-search').val();
                    const hours = $('#zipcar-rental-hours').val();
                    $.get(URL+'/zipcar-rental/cars', { search: search, hours: hours }, function(data) {
                        api_data = data;  // Store the full API data
                        updateResults(api_data);  // Show all cars initially
                    });
                }

                function filterCarByName(val, filterData) {
                    //Filter cars by name                    
                    if (api_data) {
                        if(val == ''){
                            console.log('empty val', val, api_data);
                            updateResults(api_data);
                            return;
                        }
                        let filtered_cars = filterData.filter(function (car) {
                            return car.title.toLowerCase().includes(val.toLowerCase());
                        });
                        updateResults(filtered_cars);
                    }

                }

                $form.on('submit', function (e) {
                    e.preventDefault();
                    fetchCars();
                });
                $('#zipcar-rental-search').on('input', function (e) {                    
                    e.preventDefault();
                    console.log('Input val--', e.target.value);
                    filterCarByName(e.target.value, api_data);

                });
                fetchCars();
            });
        }
    };
})(jQuery, Drupal);