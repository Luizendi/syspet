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
                views: {
                    month: {
                        titleFormat: 'MMMM YYYY'
                    },
                    week: {
                        titleFormat: "MMMM D YYYY"
                    },
                    day: {
                        titleFormat: 'D MMMM, YYYY'
                    }
                },
                eventClick: function(event, element) {

                    window.location.href = "/atendimento/agendamentos/new/" + event.id;

                    $('#calendar').fullCalendar('updateEvent', event);

                },

                // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
                events: '{{ route('agendamentos.api') }}'
            });
        });
    </script>
@endpush
