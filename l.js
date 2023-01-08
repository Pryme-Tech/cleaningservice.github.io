function slowFunc(callback) {
    // simulate a slow operation
    setTimeout(function() {
      callback();
    }, 2000);
  }
  
  slowFunc(function() {
    console.log('The slow operation has completed');
  });
  
  console.log('This code runs immediately');
  