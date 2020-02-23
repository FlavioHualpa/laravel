

window.onload = function ()
{
   let btnNewQuestion = document.querySelector('#btn-new-qstn');
   let newQuestionTplt = document.querySelector('#create-qstn-tplt');
   let questionnaire = document.querySelector('#questionnaire-body');
   let numQuestions = parseInt(document.querySelector('#questionnaire-card').getAttribute('data-questions'));
   let addingQuestion = false;

   btnNewQuestion.addEventListener(
      'click',
      function (ev)
      {
         ev.preventDefault();

         if (addingQuestion)
         {
            questionnaire.querySelector('#question').focus();
            return;
         }

         let tpltContent = newQuestionTplt.content.cloneNode(true);
         questionnaire.appendChild(tpltContent);
         questionnaire.querySelector('#question').focus();
         addingQuestion = true;
         
         let lastChoiceId = 2;
         let btnAddChoice = document.querySelector('#btn-add');
         let btnSave = document.querySelector('#btn-save');
         let btnCancel = document.querySelector('#btn-cancel');

         btnAddChoice.addEventListener(
            'click',
            function () {
               lastChoiceId++;
               addChoice(lastChoiceId);
            }
         );

         btnSave.addEventListener('click', validateAndSave);

         btnCancel.addEventListener('click', cancelAddQuestion);
      }
   )

   function addChoice(choiceId)
   {
      let choices = document.querySelector('#choices-card ul');
      let tplt = document.querySelector('#create-choice-tplt');
      let tpltClone = tplt.content.cloneNode(true);
      let label = tpltClone.querySelector('label');
      let input = tpltClone.querySelector('input');

      label.setAttribute('for', `choice.${choiceId}`);
      label.innerText = `Respuesta ${choiceId}`;

      input.setAttribute('id', `choice.${choiceId}`);
      choices.appendChild(tpltClone);
      input.focus();
      event.preventDefault();
   }

   function validateAndSave(ev)
   {
      let qstnField = document.querySelector('#question');
      let choicesFields = document.querySelectorAll('input[id^=choice]');
      let validationFailed = false;

      validationFailed |= isInputInvalid(qstnField);

      for (let choiceField of choicesFields)
         validationFailed |= isInputInvalid(choiceField);
      
      if (validationFailed)
      {
         ev.preventDefault();
         qstnField.focus();
      }
   }

   function isInputInvalid(input)
   {
      if (input.value.trim() == '')
      {
         input.classList.add('is-invalid');
         input.nextElementSibling.style.display = 'block';
         return true;
      }

      input.classList.remove('is-invalid');
      input.nextElementSibling.style.display = 'none';
      return false;
   }

   function cancelAddQuestion(ev)
   {
      let tplt = document.querySelector('#form-new-qstn');
      questionnaire.removeChild(tplt);
      addingQuestion = false;
      ev.preventDefault();
   }
}
