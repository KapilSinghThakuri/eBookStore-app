  // For displaying user informations

  var profileBtn = document.getElementById('profileBtn');
  var profileModal = document.getElementById('profileModal');
  var cancelBtn = document.getElementById('cancelBtn');

  profileBtn.addEventListener('click', function(event) {
      event.preventDefault();
      profileModal.style.display = 'block';
  });
  cancelBtn.addEventListener('click',function(event){
      profileModal.style.display = 'none';
  });

