var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

/*-------first box ----*/

var recognition1 = new SpeechRecognition();

var noteTextarea1 = $('#note-textarea1');
var instructions1 = $('#recording-instructions1');

var noteContent1 = '';

recognition1.continuous = true;

recognition1.onresult = function(event) {
  var current = event.resultIndex;


  var transcript = event.results[current][0].transcript;
  var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);

  if(!mobileRepeatBug) {
    noteContent1 += transcript;
    noteTextarea1.val(noteContent1);
  }
};

recognition1.onstart = function() { 
  instructions1.text('Voice recognition activated. Try speaking into the microphone.');
}

recognition1.onspeechend = function() {
  instructions1.text('You were quiet for a while so voice recognition turned itself off.');
}

recognition1.onerror = function(event) {
  if(event.error == 'no-speech') {
    instructions1.text('No speech was detected. Try again.');  
  };
}

function saveNote(dateTime, content) {
  noteContent1.text('note-' + dateTime, content);
}


$('#start-record-btn1').on('click', function(e) {
  if (noteContent1.length) {
    noteContent1 += ' ';
  }
  recognition1.start();
});


$('#pause-record-btn1').on('click', function(e) {
  recognition1.stop();
  instructions1.text('Voice recognition paused.');
});

// Sync the text inside the text area with the noteContent1 variable.
noteTextarea1.on('input', function() {
  noteContent1 = $(this).val();
})

$('#save-note-btn1').on('click', function(e) {
  recognition1.stop();

  if(!noteContent1.length) {
    instructions1.text('Could not save empty note. Please add a message to your note.');
  }
  else {
    instructions1.text('Note saved successfully.');
  }
      
})

/*--------second Box--------*/

var recognition2 = new SpeechRecognition();

var noteTextarea2 = $('#note-textarea2');
var instructions2 = $('#recording-instructions2');
var noteContent2 = '';

recognition2.continuous = true;

recognition2.onresult = function(event) {
  var current = event.resultIndex;
  var transcript = event.results[current][0].transcript;
  var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);

  if(!mobileRepeatBug) {
    noteContent2 += transcript;
    noteTextarea2.val(noteContent2);
  }
};

recognition2.onstart = function() { 
  instructions2.text('Voice recognition activated. Try speaking into the microphone.');
}

recognition2.onspeechend = function() {
  instructions2.text('You were quiet for a while so voice recognition turned itself off.');
}

recognition2.onerror = function(event) {
  if(event.error == 'no-speech') {
    instructions2.text('No speech was detected. Try again.');  
  };
}

$('#start-record-btn2').on('click', function(e) {
  if (noteContent2.length) {
    noteContent2 += ' ';
  }
  recognition2.start();
});


$('#pause-record-btn2').on('click', function(e) {
  recognition2.stop();
  instructions2.text('Voice recognition paused.');
});

// Sync the text inside the text area with the noteContent2 variable.
noteTextarea2.on('input', function() {
  noteContent2 = $(this).val();
})

$('#save-note-btn2').on('click', function(e) {
  recognition2.stop();

  if(!noteContent2.length) {
    instructions2.text('Could not save empty note. Please add a message to your note.');
  }
  else {
    instructions2.text('Note saved successfully.');
  }
      
})

/*--------third Box--------*/
var recognition3 = new SpeechRecognition();

var noteTextarea3 = $('#note-textarea3');
var instructions3 = $('#recording-instructions3');
var noteContent3 = '';

recognition3.continuous = true;

recognition3.onresult = function(event) {
  var current = event.resultIndex;
  var transcript = event.results[current][0].transcript;
  var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);

  if(!mobileRepeatBug) {
    noteContent3 += transcript;
    noteTextarea3.val(noteContent3);
  }
};

recognition3.onstart = function() { 
  instructions3.text('Voice recognition activated. Try speaking into the microphone.');
}

recognition3.onspeechend = function() {
  instructions3.text('You were quiet for a while so voice recognition turned itself off.');
}

recognition3.onerror = function(event) {
  if(event.error == 'no-speech') {
    instructions3.text('No speech was detected. Try again.');  
  };
}

$('#start-record-btn3').on('click', function(e) {
  if (noteContent3.length) {
    noteContent3 += ' ';
  }
  recognition3.start();
});


$('#pause-record-btn3').on('click', function(e) {
  recognition3.stop();
  instructions3.text('Voice recognition paused.');
});

// Sync the text inside the text area with the noteContent3 variable.
noteTextarea3.on('input', function() {
  noteContent3 = $(this).val();
})

$('#save-note-btn3').on('click', function(e) {
  recognition3.stop();

  if(!noteContent3.length) {
    instructions3.text('Could not save empty note. Please add a message to your note.');
  }
  else {
    instructions3.text('Note saved successfully.');
  }
      
})


/*--------fourth Box--------*/
var recognition4 = new SpeechRecognition();

var noteTextarea4 = $('#note-textarea4');
var instructions4 = $('#recording-instructions4');
var noteContent4 = '';

recognition4.continuous = true;

recognition4.onresult = function(event) {
  var current = event.resultIndex;
  var transcript = event.results[current][0].transcript;
  var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);

  if(!mobileRepeatBug) {
    noteContent4 += transcript;
    noteTextarea4.val(noteContent4);
  }
};

recognition4.onstart = function() { 
  instructions4.text('Voice recognition activated. Try speaking into the microphone.');
}

recognition4.onspeechend = function() {
  instructions4.text('You were quiet for a while so voice recognition turned itself off.');
}

recognition4.onerror = function(event) {
  if(event.error == 'no-speech') {
    instructions4.text('No speech was detected. Try again.');  
  };
}

$('#start-record-btn4').on('click', function(e) {
  if (noteContent4.length) {
    noteContent4 += ' ';
  }
  recognition4.start();
});


$('#pause-record-btn4').on('click', function(e) {
  recognition4.stop();
  instructions4.text('Voice recognition paused.');
});

// Sync the text inside the text area with the noteContent4 variable.
noteTextarea4.on('input', function() {
  noteContent4 = $(this).val();
})

$('#save-note-btn4').on('click', function(e) {
  recognition4.stop();

  if(!noteContent4.length) {
    instructions4.text('Could not save empty note. Please add a message to your note.');
  }
  else {
    instructions4.text('Note saved successfully.');
  }
      
})



/*--------fifth Box--------*/

var recognition5 = new SpeechRecognition();

var noteTextarea5 = $('#note-textarea5');
var instructions5 = $('#recording-instructions5');
var noteContent5 = '';

recognition5.continuous = true;

recognition5.onresult = function(event) {
  var current = event.resultIndex;
  var transcript = event.results[current][0].transcript;
  var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);

  if(!mobileRepeatBug) {
    noteContent5 += transcript;
    noteTextarea5.val(noteContent5);
  }
};

recognition5.onstart = function() { 
  instructions5.text('Voice recognition activated. Try speaking into the microphone.');
}

recognition5.onspeechend = function() {
  instructions5.text('You were quiet for a while so voice recognition turned itself off.');
}

recognition5.onerror = function(event) {
  if(event.error == 'no-speech') {
    instructions5.text('No speech was detected. Try again.');  
  };
}

$('#start-record-btn5').on('click', function(e) {
  if (noteContent5.length) {
    noteContent5 += ' ';
  }
  recognition5.start();
});


$('#pause-record-btn5').on('click', function(e) {
  recognition5.stop();
  instructions5.text('Voice recognition paused.');
});

// Sync the text inside the text area with the noteContent5 variable.
noteTextarea5.on('input', function() {
  noteContent5 = $(this).val();
})

$('#save-note-btn5').on('click', function(e) {
  recognition5.stop();

  if(!noteContent5.length) {
    instructions5.text('Could not save empty note. Please add a message to your note.');
  }
  else {
    instructions5.text('Note saved successfully.');
  }
      
})

/*--------sixth Box--------*/

var recognition6 = new SpeechRecognition();

var noteTextarea6 = $('#note-textarea6');
var instructions6 = $('#recording-instructions6');
var noteContent6 = '';

recognition6.continuous = true;

recognition6.onresult = function(event) {
  var current = event.resultIndex;
  var transcript = event.results[current][0].transcript;
  var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);

  if(!mobileRepeatBug) {
    noteContent6 += transcript;
    noteTextarea6.val(noteContent6);
  }
};

recognition6.onstart = function() { 
  instructions6.text('Voice recognition activated. Try speaking into the microphone.');
}

recognition6.onspeechend = function() {
  instructions6.text('You were quiet for a while so voice recognition turned itself off.');
}

recognition6.onerror = function(event) {
  if(event.error == 'no-speech') {
    instructions6.text('No speech was detected. Try again.');  
  };
}

$('#start-record-btn6').on('click', function(e) {
  if (noteContent6.length) {
    noteContent6 += ' ';
  }
  recognition6.start();
});


$('#pause-record-btn6').on('click', function(e) {
  recognition6.stop();
  instructions6.text('Voice recognition paused.');
});

// Sync the text inside the text area with the noteContent6 variable.
noteTextarea6.on('input', function() {
  noteContent6 = $(this).val();
})

$('#save-note-btn6').on('click', function(e) {
  recognition6.stop();

  if(!noteContent6.length) {
    instructions6.text('Could not save empty note. Please add a message to your note.');
  }
  else {
    instructions6.text('Note saved successfully.');
  }
      
})



/*--------seventh Box--------*/
var recognition7 = new SpeechRecognition();

var noteTextarea7 = $('#note-textarea7');
var instructions7 = $('#recording-instructions7');
var noteContent7 = '';

recognition7.continuous = true;

recognition7.onresult = function(event) {
  var current = event.resultIndex;
  var transcript = event.results[current][0].transcript;
  var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);

  if(!mobileRepeatBug) {
    noteContent7 += transcript;
    noteTextarea7.val(noteContent7);
  }
};

recognition7.onstart = function() { 
  instructions7.text('Voice recognition activated. Try speaking into the microphone.');
}

recognition7.onspeechend = function() {
  instructions7.text('You were quiet for a while so voice recognition turned itself off.');
}

recognition7.onerror = function(event) {
  if(event.error == 'no-speech') {
    instructions7.text('No speech was detected. Try again.');  
  };
}

$('#start-record-btn7').on('click', function(e) {
  if (noteContent7.length) {
    noteContent7 += ' ';
  }
  recognition7.start();
});


$('#pause-record-btn7').on('click', function(e) {
  recognition7.stop();
  instructions7.text('Voice recognition paused.');
});

// Sync the text inside the text area with the noteContent7 variable.
noteTextarea7.on('input', function() {
  noteContent7 = $(this).val();
})

$('#save-note-btn7').on('click', function(e) {
  recognition7.stop();

  if(!noteContent7.length) {
    instructions7.text('Could not save empty note. Please add a message to your note.');
  }
  else {
    instructions7.text('Note saved successfully.');
  }
      
})



/*--------eightth Box--------*/


var recognition8 = new SpeechRecognition();

var noteTextarea8 = $('#note-textarea8');
var instructions8 = $('#recording-instructions8');
var noteContent8 = '';

recognition8.continuous = true;

recognition8.onresult = function(event) {
  var current = event.resultIndex;
  var transcript = event.results[current][0].transcript;
  var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);

  if(!mobileRepeatBug) {
    noteContent8 += transcript;
    noteTextarea8.val(noteContent8);
  }
};

recognition8.onstart = function() { 
  instructions8.text('Voice recognition activated. Try speaking into the microphone.');
}

recognition8.onspeechend = function() {
  instructions8.text('You were quiet for a while so voice recognition turned itself off.');
}

recognition8.onerror = function(event) {
  if(event.error == 'no-speech') {
    instructions8.text('No speech was detected. Try again.');  
  };
}

$('#start-record-btn8').on('click', function(e) {
  if (noteContent8.length) {
    noteContent8 += ' ';
  }
  recognition8.start();
});


$('#pause-record-btn8').on('click', function(e) {
  recognition8.stop();
  instructions8.text('Voice recognition paused.');
});

// Sync the text inside the text area with the noteContent8 variable.
noteTextarea8.on('input', function() {
  noteContent8 = $(this).val();
})

$('#save-note-btn8').on('click', function(e) {
  recognition8.stop();

  if(!noteContent8.length) {
    instructions8.text('Could not save empty note. Please add a message to your note.');
  }
  else {
    instructions8.text('Note saved successfully.');
  }
      
})

/*--------ninth Box--------*/

var recognition9 = new SpeechRecognition();

var noteTextarea9 = $('#note-textarea9');
var instructions9 = $('#recording-instructions9');
var noteContent9 = '';

recognition9.continuous = true;

recognition9.onresult = function(event) {
  var current = event.resultIndex;
  var transcript = event.results[current][0].transcript;
  var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);

  if(!mobileRepeatBug) {
    noteContent9 += transcript;
    noteTextarea9.val(noteContent9);
  }
};

recognition9.onstart = function() { 
  instructions9.text('Voice recognition activated. Try speaking into the microphone.');
}

recognition9.onspeechend = function() {
  instructions9.text('You were quiet for a while so voice recognition turned itself off.');
}

recognition9.onerror = function(event) {
  if(event.error == 'no-speech') {
    instructions9.text('No speech was detected. Try again.');  
  };
}

$('#start-record-btn9').on('click', function(e) {
  if (noteContent9.length) {
    noteContent9 += ' ';
  }
  recognition9.start();
});


$('#pause-record-btn9').on('click', function(e) {
  recognition9.stop();
  instructions9.text('Voice recognition paused.');
});

// Sync the text inside the text area with the noteContent9 variable.
noteTextarea9.on('input', function() {
  noteContent9 = $(this).val();
})

$('#save-note-btn9').on('click', function(e) {
  recognition9.stop();

  if(!noteContent9.length) {
    instructions9.text('Could not save empty note. Please add a message to your note.');
  }
  else {
    instructions9.text('Note saved successfully.');
  }
      
})

/*--------tenth Box--------*/

var recognition10 = new SpeechRecognition();

var noteTextarea10 = $('#note-textarea10');
var instructions10 = $('#recording-instructions10');
var noteContent10 = '';

recognition10.continuous = true;

recognition10.onresult = function(event) {
  var current = event.resultIndex;
  var transcript = event.results[current][0].transcript;
  var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);

  if(!mobileRepeatBug) {
    noteContent10 += transcript;
    noteTextarea10.val(noteContent10);
  }
};

recognition10.onstart = function() { 
  instructions10.text('Voice recognition activated. Try speaking into the microphone.');
}

recognition10.onspeechend = function() {
  instructions10.text('You were quiet for a while so voice recognition turned itself off.');
}

recognition10.onerror = function(event) {
  if(event.error == 'no-speech') {
    instructions10.text('No speech was detected. Try again.');  
  };
}

$('#start-record-btn10').on('click', function(e) {
  if (noteContent10.length) {
    noteContent10 += ' ';
  }
  recognition10.start();
});


$('#pause-record-btn10').on('click', function(e) {
  recognition10.stop();
  instructions10.text('Voice recognition paused.');
});

// Sync the text inside the text area with the noteContent10 variable.
noteTextarea10.on('input', function() {
  noteContent10 = $(this).val();
})

$('#save-note-btn10').on('click', function(e) {
  recognition10.stop();

  if(!noteContent10.length) {
    instructions10.text('Could not save empty note. Please add a message to your note.');
  }
  else {
    instructions10.text('Note saved successfully.');
  }
      
})
/*--------eleventh Box--------*/


var recognition11 = new SpeechRecognition();

var noteTextarea11 = $('#note-textarea11');
var instructions11 = $('#recording-instructions11');
var noteContent11 = '';

recognition11.continuous = true;

recognition11.onresult = function(event) {
  var current = event.resultIndex;
  var transcript = event.results[current][0].transcript;
  var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);

  if(!mobileRepeatBug) {
    noteContent11 += transcript;
    noteTextarea11.val(noteContent11);
  }
};

recognition11.onstart = function() { 
  instructions11.text('Voice recognition activated. Try speaking into the microphone.');
}

recognition11.onspeechend = function() {
  instructions11.text('You were quiet for a while so voice recognition turned itself off.');
}

recognition11.onerror = function(event) {
  if(event.error == 'no-speech') {
    instructions11.text('No speech was detected. Try again.');  
  };
}

$('#start-record-btn11').on('click', function(e) {
  if (noteContent11.length) {
    noteContent11 += ' ';
  }
  recognition11.start();
});


$('#pause-record-btn11').on('click', function(e) {
  recognition11.stop();
  instructions11.text('Voice recognition paused.');
});

// Sync the text inside the text area with the noteContent11 variable.
noteTextarea11.on('input', function() {
  noteContent11 = $(this).val();
})

$('#save-note-btn11').on('click', function(e) {
  recognition11.stop();

  if(!noteContent11.length) {
    instructions11.text('Could not save empty note. Please add a message to your note.');
  }
  else {
    instructions11.text('Note saved successfully.');
  }
      
})

/*--------twelevth Box--------*/

var recognition12 = new SpeechRecognition();

var noteTextarea12 = $('#note-textarea12');
var instructions12 = $('#recording-instructions12');
var noteContent12 = '';

recognition12.continuous = true;

recognition12.onresult = function(event) {
  var current = event.resultIndex;
  var transcript = event.results[current][0].transcript;
  var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);

  if(!mobileRepeatBug) {
    noteContent12 += transcript;
    noteTextarea12.val(noteContent12);
  }
};

recognition12.onstart = function() { 
  instructions12.text('Voice recognition activated. Try speaking into the microphone.');
}

recognition12.onspeechend = function() {
  instructions12.text('You were quiet for a while so voice recognition turned itself off.');
}

recognition12.onerror = function(event) {
  if(event.error == 'no-speech') {
    instructions12.text('No speech was detected. Try again.');  
  };
}

$('#start-record-btn12').on('click', function(e) {
  if (noteContent12.length) {
    noteContent12 += ' ';
  }
  recognition12.start();
});


$('#pause-record-btn12').on('click', function(e) {
  recognition12.stop();
  instructions12.text('Voice recognition paused.');
});

// Sync the text inside the text area with the noteContent12 variable.
noteTextarea12.on('input', function() {
  noteContent12 = $(this).val();
})

$('#save-note-btn12').on('click', function(e) {
  recognition12.stop();

  if(!noteContent12.length) {
    instructions12.text('Could not save empty note. Please add a message to your note.');
  }
  else {
    instructions12.text('Note saved successfully.');
  }
      
})
