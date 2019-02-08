
        // JavaScript goes here
        
        function $(id){
                return document.querySelector(id);
            }
            
            var randomNumber = Math.floor(Math.random() * 99) + 1;// Any number between 1-99
            console.log(randomNumber);
            var guesses = $('#guesses');
            var lastResult = $('#lastResult');
            var lowOrHi = $('#lowOrHi');
            
            var guessSubmit = $('.guessSubmit');
            var guessField = $('.guessField');
            var guessCount = 1;
            var resetButton = $('#reset');
            
            var guessLoss = $('#missedGuess');
            var correctGuess = $('#hitGuess');
            
            var lossCount = 0;
            var winCount = 0;
           
            resetButton.style.display = 'none';
            guessField.focus();
          
          
            //var resetButton;
           function checkGuess(){
               var userGuess = Number(guessField.value);
               if(guessCount === 1){
                   guesses.innerHTML = 'Previous guesses: ';
                   
               }
               
               guesses.innerHTML += userGuess + ' ';
               if(userGuess === randomNumber) {
                   winCount++;
                   lastResult.innerHTML = 'Congratulations! You got it right! ';
                   lastResult.style.backgroundColor = 'green';
                   lowOrHi.innerHTML = '';
                   setGameOver();
                   
               }
               
               else if(guessCount === 7) {
                   lastResult.innerHTML = 'Sorry, you lost!';
                   lossCount++;
                   setGameOver();
               }
               
               else{
                   lastResult.innerHTML = 'Wrong!';
                   lastResult.style.backgroundColor = 'red';
                   
                   if(userGuess < randomNumber) {
                       lowOrHi.innerHTML = 'Last guess was too low!';
                   }
                   
                   else if(userGuess > randomNumber){
                       lowOrHi.innerHTML = 'Last guess was too high!';
                   }
               }
               
               if(userGuess > 99)
               {
                   lastResult.innerHTML = "Wrong! Number cannot be greater than 99";
                   lastResult.style.backgroundColor = 'yellow';
                   return;
               }
               else
               {
                   /*
                   if(userGuess === randomNumber)
                   {
                       lossCount--;
                   }*/
                     
                  
                   guessLoss.innerHTML = "Games lost: " + lossCount +
                        " | Games won: " + winCount; 
                    guessCount++;
                    //lastResult.innerHTML = "Correct guesses: " + winCount;
                    guessField.value = '';
                    guessField.focus();
               }
               
               
           }
           guessSubmit.addEventListener('click', checkGuess);
           
           function setGameOver(){
               guessField.disabled = true;
               guessSubmit.disabled = true;
               resetButton.style.display = 'inline';
               resetButton.addEventListener('click', resetGame);
           }
           
           function resetGame(){
               guessCount = 1;
               
               var resetParas = document.querySelectorAll('.resultParas p');
               for(var i = 0; i < resetParas.length; i++){
                   resetParas[i].textContent = '';
               }
               
               resetButton.style.display = 'none';
               
               guessField.disabled = false;
               guessSubmit.disabled = false;
               guessField.value = '';
               guessField.focus();
               
               lastResult.style.backgroundColor = 'white';
               
               randomNumber = Math.floor(Math.random() * 99) + 1;
           }
            