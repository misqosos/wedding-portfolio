
questionNumber = 1;
correctAnswersNum = 0;
arrays = person.variables.arrays;
booleans = person.variables.booleans;
dates = person.variables.dates;
formSubmitted = false;
isAllCorrect = false;
revealedAnswers = false;
correctAnswers = new Map();
templateFormData = {};

form = {
  personName: this.person.dbRowDistinction,
  id: null,
  make: null,
  dob: null,
  meetingPlace: null,
  age: null,
  hobbies: null,
  owner: null,
  height: null,
  favSport: null,
  hasSeenParentsFirst: null,
  favColor: null,
  shop: null,
  playedOtherMovie: null,
  hairColor: null,
  isAllCorrect: null
}

function onSubmit() {
  const questionName = document.getElementsByName('questionWrapper')[this.questionNumber - 1].title;
  this.templateFormData = getTemplateFormData('person-form', this.form, questionName);

  this.formSubmitted = true;
  
  this.comparePerson(templateFormData, questionName);

  setQuestionVisibility(this.questionNumber, false);
  setElementVisibility('submit-button', false);
  
  this.postPerson(templateFormData)
}

function nextQuestion() {
  const questionName = document.getElementsByName('questionWrapper')[this.questionNumber - 1].title;

  this.templateFormData = getTemplateFormData('person-form', this.form, questionName);
  
  this.comparePerson(templateFormData, questionName);

  setElementVisibility('next-button', false);
  setTimeout(() => {
    setQuestionVisibility(this.questionNumber, false);
    this.questionNumber++;
    setQuestionVisibility(this.questionNumber, true);
    if (this.questionNumber < document.getElementsByName('questionWrapper').length) {
      setElementVisibility('next-button', true, 'flex');
    } else { setElementVisibility('submit-button', true); }
  }, 1000);
}

function addToArray(event, formControlName) {
  templateFormData[formControlName] = [];
  if (event.target.checked) {
    if (!this.templateFormData[formControlName].includes(event.target.value)) {
      this.templateFormData[formControlName].push(event.target.value);
    }
  }
  if (!event.target.checked) {
    this.templateFormData[formControlName].splice(this.templateFormData[formControlName].indexOf(event.target.value), 1);
  }
  this.form[formControlName] = this.templateFormData[formControlName];
}

function areEqualArrays(a, b) {
  if (a && b) {
    if (a.length !== b.length) return false;
    const elements = new Set([...a, ...b]);
    for (const x of elements) {
      const count1 = a.filter(e => e === x).length;
      const count2 = b.filter(e => e === x).length;
      if (count1 !== count2) return false;
    }
    return true;
  }
  return false;
}

function compareObjects(referenceObj, comparingObj, questionName) {
  this.mapCorrectPerson(this.questionNumber, questionName);
  if (referenceObj) {
    // pre arrays
    if (this.arrays.includes(questionName)) {
      comparingObj[questionName] = this.templateFormData[questionName];
      if (this.areEqualArrays(comparingObj[questionName], JSON.parse(referenceObj[questionName].toString()))) {
        this.showImage('happy-person');
        this.correctAnswersNum++;
      } else {
        this.showImage('sad-person');
      } 
      return;
    }
    // pre datumy
    if (this.dates.includes(questionName)) {
      if (comparingObj[questionName]) {
      if (areEqualDates(comparingObj[questionName].reverse().join("-"), referenceObj[questionName])) {
        this.showImage('happy-person');
        this.correctAnswersNum++;
      } else {
        this.showImage('sad-person');
      }
      return;
    }}
    // pre ostatne
    if (comparingObj[questionName] == referenceObj[questionName]) {
      this.showImage('happy-person');
      this.correctAnswersNum++;
    } else {
      if (!this.arrays?.includes(questionName)) {
        this.showImage('sad-person');
      }
    }
  } else {
    console.log('Referencna osoba nie je v databaze.');
  }
}

function comparePerson(comparingObj, questionName) {
  this.getCorrectPerson(this.person.dbRowDistinction).then((correctPerson) => {
    if (correctPerson) {
      this.compareObjects(correctPerson, comparingObj, questionName);
      if(this.formSubmitted) { makeFinalStatement(); }
    } else {
      console.log('Referencna osoba nie je v databaze.');
    }
  })
}

function mapCorrectPerson(questionNumber, questionName) {
  this.getCorrectPerson(this.person.dbRowDistinction).then((correctPerson) => {
    if (correctPerson) {
      if (this.dates?.concat(this.booleans, this.arrays).includes(questionName)) {
        if (this.arrays?.includes(questionName)) {
          let convertedArray = JSON.parse(correctPerson[questionName]);
          this.correctAnswers.set(questionNumber, convertedArray.concat());
        }
        if (this.dates?.includes(questionName)) {
          let date = this.formatDate(correctPerson[questionName], true);
          this.correctAnswers.set(questionNumber, date);
        }
        if (this.booleans?.includes(questionName)) {
          let convertedBoolean = Boolean(Number(correctPerson[questionName])) == true ? "Áno" : "Nie";
          this.correctAnswers.set(questionNumber, convertedBoolean);
        }
      } else {
        this.correctAnswers.set(questionNumber, correctPerson[questionName]);
      }
    } else {
      console.log('Referencna osoba nie je v databaze.');
    }
  })  
}

function showImage(elementId) {
  setElementVisibility(elementId, true)
  setTimeout(() => {
    setElementVisibility(elementId, false)
  }, 1000);
}

function revealCorrectAnswers() {
  setElementVisibility('not-all-correct', false)
  setElementVisibility('correct-answers', true)
  showCorrectAnswers();
}

function setElementVisibility(elementId, display = true, displayStyle = 'block'){
  if (!display) {
    document.getElementById(elementId).style.display = 'none';
    return;
  }
  document.getElementById(elementId).style.display = displayStyle;
}

function setQuestionVisibility(questionNumber, display = false, displayStyle = 'block'){
  if (!display) {
    document.getElementsByName("questionWrapper")[questionNumber - 1].style.display = 'none';
    return;
  }
  document.getElementsByName("questionWrapper")[questionNumber - 1].style.display = displayStyle;
}

function showCorrectAnswers(){
  var wrapper = document.getElementById("correct-answers-looper");
  var myHTML = '';

  for (let [key, value] of this.correctAnswers) {
    myHTML += 'Otázka č. '+key+'. : <b>'+value+'</b><br>'
  }
  wrapper.innerHTML = myHTML;
}

function makeFinalStatement(){    
  if (this.questionNumber == this.correctAnswersNum) {
      this.setElementVisibility('all-correct', true)
      return;
    }
  document.getElementById('corrects-amount').innerHTML = 'Uhádol si '+ this.correctAnswersNum +' / '+ this.questionNumber +' odpovedí.'
  this.setElementVisibility('not-all-correct', true)
}