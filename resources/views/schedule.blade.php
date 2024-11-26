<x-layout :pupil="$pupil" :weekday="$date['weekDayNumber']">
   <h3 class="entry-message" >Розклад занять</h3>
    <div class="info-schedule first-info">Розклад на {{$date['day']}} {{$date['month']}} {{$date['year']}}</div>
    <div class="info-schedule">Клас {{$class['class']}}</div>

    <div class="week-days">
        <a href="/server.php/schedule/{{$pupil['id']}}/1" class="week-day-item @if($date['weekDayName'] == 'Понеділок') active-week-day @endif">Понеділок</a>
        <a href="/server.php/schedule/{{$pupil['id']}}/2" class="week-day-item @if($date['weekDayName'] == 'Вівторок') active-week-day @endif">Вівторок</a>
        <a href="/server.php/schedule/{{$pupil['id']}}/3" class="week-day-item @if($date['weekDayName'] == 'Середа') active-week-day @endif">Середа</a>
        <a href="/server.php/schedule/{{$pupil['id']}}/4" class="week-day-item @if($date['weekDayName'] == 'Четвер') active-week-day @endif">Четвер</a>
        <a href="/server.php/schedule/{{$pupil['id']}}/5" class="week-day-item @if($date['weekDayName'] == 'П\'ятниця') active-week-day @endif">П'ятниця</a>
        <a href="/server.php/schedule/{{$pupil['id']}}/6" class="week-day-item @if($date['weekDayName'] == 'Субота') active-week-day @endif">Субота</a>
        <a href="/server.php/schedule/{{$pupil['id']}}/7" class="week-day-item @if($date['weekDayName'] == 'Неділя') active-week-day @endif">Неділя</a>
    </div>

    <div class="timetable">
        @unless(empty($subjects))
    @foreach($schedule as $schedule_item)
            <div class="schedule-item">
                @foreach($subjects as $subject)
                    @if($subject['id'] == $schedule_item['subject_id'])
                        <div class="definition">{{$schedule_item['time']}} / {{$subject['subject']}} / Кабінет {{$schedule_item['studyroom']}} / {{$schedule_item['teacher']}}</div>
                    @endif
                @endforeach
                    <div class="info">{{$schedule_item['info']}}</div>

            </div>
    @endforeach
        @else
            <div class="empty">Уроки відсутні</div>
        @endunless
    </div>
</x-layout>
