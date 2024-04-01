function initForeach(){
    let divs = document.querySelectorAll('.question-box')

    divs.forEach(function(div) {
        div.style.display = 'none';
    });

    let initialDiv = document.getElementById('0')

    initialDiv.style.display = 'block'
}


function getIdDataBaseQuestion(iterator){
    let idDiv = String(iterator)
    let div = document.getElementById(idDiv)
    let id = div.querySelector('input[type=hidden]')
    id = (id.value)
    
    return id
}


function getResponses(finalElement) {
    let responses = [];
    let idQuestions = [];

    for (let iterator1 = 0; iterator1 < finalElement+1; iterator1++) {
        let options = document.getElementsByName(`question-${iterator1}`);
        let idDataBaseQuestion = getIdDataBaseQuestion(iterator1)
        
        for (let iterator2 = 0; iterator2 < options.length; iterator2++) {
            if (options[iterator2].checked) {
                let value = options[iterator2].value

                idQuestions.push(idDataBaseQuestion)
                responses.push(value)
                break;
            }
        }
    }

    let validation = false

    if (responses.length == finalElement+1){
        validation = true
    }

    return [validation,responses,idQuestions]
}


function sendReview(response,idQuestions){
    let form = document.createElement('form')
    form.style.display='none'
    form.method= 'POST'
    form.action= '/Mvc/controller/router.php'

    let route = document.createElement('input')
    route.type = 'hidden'
    route.name = 'route'
    route.value = '/sendReview'

    form.appendChild(route)
    
    let idQuestionInput = document.createElement('input')
    idQuestionInput.type = 'hidden'
    idQuestionInput.name = 'idQuestions'
    idQuestionInput.value = idQuestions

    form.appendChild(idQuestionInput)

    let responseInput = document.createElement('input')
    responseInput.type= 'hidden'
    responseInput.name = 'response'
    responseInput.value = response

    form.appendChild(responseInput)

    document.body.appendChild(form)

    form.submit()
}


function nextQuestion(idElement,finalElement){
    finalElement = finalElement-1
    idElement = Number(idElement)   

    for($i=0;$i < finalElement; $i++){
        let id = String($i)
        let div = document.getElementById(id)
        div.style.display='none'
    }
    
    if (idElement == finalElement){
        let result = getResponses(finalElement)
        let validation = result[0]
        let response = result[1]
        let idQuestions = result[2]
        console.log(validation)
        if (validation == true){
            sendReview(response,idQuestions)
        } else {
            location.reload()
        }
    } else {   
        idElement = idElement+1
        idElement = String(idElement)
        let div = document.getElementById(idElement)
        div.style.display='block'
    }
}


initForeach()