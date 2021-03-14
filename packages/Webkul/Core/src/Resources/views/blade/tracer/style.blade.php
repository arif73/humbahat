<style>
     {
        border: solid 1px transparent;
        padding: 1px;
    }

    :hover {
        border: 1px solid red;
    }

    -tooltip {
        padding: 0px 10px;
        position: absolute;
        background: #000000;
        z-index: 10000;
        color: #fff;
        font-size: 10px;
    }

    -tooltip h4 {
        margin-top: 5px;
        margin-bottom: 3px;
        color: #fff;
        font-size: 12px;
    }

    -tooltip ul li {
        margin-bottom: 3px;
    }

    .main-container-wrapper .product-card .product-image img {
        max-width: 100%;
    }
</style>

<script>
    window.addEventListener("load", function(event) {
        $('.testing').each(function(index) {
            if ($(this).siblings(':not()').length == 1
                && $(this).next().prop("tagName") != 'INPUT'
                && $(this).next().prop("tagName") != 'TEXTAREA'
                && $(this).next().prop("tagName") != 'SELECT'
            ) {
                $(this).next().addClass('path-hint');

                $(this).next().attr({
                    'data-toggle': 'tooltip',
                    'data-title': $(this).parent('').attr('data-title'),
                    'data-id': $(this).parent('').attr('data-id')
                });

                $(this).unwrap();
            }

            $(this).remove();
        });

        $('').on('mouseover', function(e) {
            e.stopPropagation();

            var currentElement = $(e.currentTarget);

            var tooltipContent = '<h4>{{ __("core::app.template") }}</h4>' + currentElement.attr('data-title');

            if ($(this).parents('').length) {
                tooltipContent += '<h4>{{ __("core::app.parents") }}</h4>';

                tooltipContent += '<ul>';

                $(this).parents('').each(function(index) {
                    tooltipContent += '<li>' + $(this).attr('data-title')  + '</li>';
                });

                tooltipContent += '</ul>';
            }

            $('body').append("<span class='path-hint-tooltip' id='" + currentElement.attr('data-id') + "'>" + tooltipContent + "</span>")

            var elementWidth = currentElement.outerWidth()

            var tooltipWidth = $('-tooltip').outerWidth()

            var leftOffset = currentElement.offset().left;

            minus = 0;

            temp = leftOffset + (elementWidth / 2) + (tooltipWidth / 2)

            if (temp > $(window).outerWidth()) {
                minus = temp - $(window).outerWidth();
            }

            if (elementWidth > tooltipWidth) {
                var left = leftOffset + ((elementWidth / 2) - (tooltipWidth / 2));
            } else {
                var left = leftOffset - ((tooltipWidth / 2) - (elementWidth / 2));
            }

            if (left <= 0) {
                left = 10;
            }

            $('-tooltip').css('left', left - minus)

            $('-tooltip').css('top', currentElement.offset().top + 20)
        })

        $('[data-toggle="tooltip"]').on('mouseout', function(e) {
            var currentElement = $(e.currentTarget);

            $("#" + currentElement.attr('data-id')).remove();
        })
    })
</script>