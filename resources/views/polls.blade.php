@php
@endphp
<x-layout :pupil="$pupil" :weekday="$weekday">
    <h3 class="entry-message">Опитування</h3>
    @unless(empty($polls))
    @foreach($polls as $poll)
    <div class="poll-item">
        <form method="POST">
            @csrf
            <div class="question">{{$poll['question']['question']}}</div>
            @error('answer')
            <p class="error-message">Ви не обрали жодну відповідь!</p>
            @enderror
            <ul>
            @foreach($poll['answers'] as $id => $answer)
                <li class="answer-item"><input class="answer-input" value="{{$answer}}" name=""  readonly></li>
            @endforeach
            </ul>
            <input type="hidden" name="poll_id" value="{{$poll['question']['id']}}">
            <input class="submit-poll" type="submit" value="Відправити" >
        </form>
    </div>
    @endforeach
    @else
        <div class="no-polls">Наразі немає опитувань</div>
    @endunless
</x-layout>
<script>
    let lies = document.querySelectorAll('li');
    let inputs = document.querySelectorAll('input');
    let forms = document.querySelectorAll('form');
    let chosen_input = undefined;

    lies.forEach(li=> {
        li.addEventListener('click', ()=>{
            removeActiveStyle();
            li.classList.add('active-answer');
        })
    })

    function removeActiveStyle(){
        lies.forEach(li=>{
            li.classList.remove('active-answer')
        })
    }

    inputs.forEach(input=> {
        input.addEventListener('click', ()=>{
            if (input.type != 'submit'){
                if (chosen_input !== undefined){
                    chosen_input.name = "";
                }
                input.name = 'answer';
                chosen_input = input;
            }
        })
    })




</script>


