@extends('atendimento::layouts.app', ['activePage' => 'agendamentos', 'titlePage' => 'Agendamentos'])

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header card-header-icon card-header-primary">
                <div class="card-icon">
                    <i class="material-icons">today</i>
                </div>
                <h4 class="card-title ">Agendamentos</h4>
            </div>
            <div class="card-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $calendar = $('#calendar');

            today = new Date();
            y = today.getFullYear();
            m = today.getMonth();
            d = today.getDate();

            $calendar.fullCalendar({

                defaultView: 'agendaDay',
                locale: 'pt-br',

                viewRender: function(view, element) {
                    // We make sure that we activate the perfect scrollbar when the view isn't on Month
                    if (view.name != 'month') {
                        $(element).find('.fc-scroller').perfectScrollbar();
                    }
                },
                header: {
                    left: 'title',
                    center: 'month,agendaWeek,agendaDay',
                    right: 'prev,next,today'
                },
                defaultDate: today,
                selectable: true,
                selectHelper: true,
                views: {
                    month: { // name of view
                        titleFormat: 'MMMM YYYY'
                        // other view-specific options here
                    },
                    week: {
                        titleFormat: " MMMM D YYYY"
                    },
                    day: {
                        titleFormat: 'D MMMM, YYYY'
                    }
                },

                select: function(start, end) {

                },
                editable: true,
                eventLimit: true, // allow "more" link when too many events

                // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
                events: '{{ route('') }}'
            });
        });
    </script>
@endpush
