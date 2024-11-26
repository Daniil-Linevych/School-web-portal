<x-layout :pupil="$pupil" :weekday="$weekday">
    <h3 class="entry-message"><div>Ви увійшли до власного учнівського кабінету</div></h3>
    @unless(empty($pupil))
    <div class="container">
       <table>
           <thead>
           <tr><th colspan="2" > Інформація про учня </th></tr>
           </thead>
           <tbody>
           <tr><td>ПІБ</td><td>{{$pupil['surname']}} {{$pupil['firstName']}} {{$pupil['lastName']}} </td></tr>
           <tr><td>Клас</td><td>{{$class['class']}}</td></tr>
           <tr><td>Навчальний профіль</td><td>{{$studyProfile['study_profile']}}</td></tr>
           </tbody>
       </table>
        <table>
            <thead>
            <tr><th colspan="2" > <div>Підсумкова інформація про навчання </div><div>за {{$class['class'][0]}} клас {{$halfYear}} семестр</div></th></tr>
            </thead>
            <tbody>
            @foreach($subjects as $subject)
                @foreach($marks as $mark)
                    @if($mark['subject_id'] == $subject['id'])
                        <tr><td>{{$subject['subject']}}</td><td>{{$mark['mark']}}</td></tr>
                    @endif
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>

    @else
    <p>There are no such student</p>
    @endunless

</x-layout>
