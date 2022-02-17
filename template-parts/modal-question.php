<div class="question-modal">
     <div class="question-inner">
        <h3>З якої ви країни?</h3>
         <p><a class="question-link" href="?country=uk">Україна</a></p>
         <p><a class="question-link" href="?country=ru">Росія</a></p>
         <p><a class="question-link" href="?country=blr">Білорусь</a></p>
     </div>
</div>
<script>
    let modalQuestion = document.querySelectorAll('.question-modal')[0];
    let cookieCountry = (document.cookie.match(/^(?:.*;)?\s*country\s*=\s*([^;]+)(?:.*)?$/)||[,null])[1];
    if(cookieCountry == 'ru'){
        window.location.href = window.location.origin + '/error';
    }
    setTimeout(function (){
        if(!cookieCountry){
            modalQuestion.classList.add('show');
        }
    }, 1000);
</script>