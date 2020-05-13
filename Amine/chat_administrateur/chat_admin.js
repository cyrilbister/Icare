$(function() {
    afficheConversation();
      
    $('#envoyer').click(function() {
        var nom = $('#nom').val();
        var message = $('#message').val();
        $.post('chat.php', {
            'nom': nom,
            'message': message
        }, afficheConversation);
    });

    function afficheConversation() {
      $('#conversation').load('ac.htm');
      $('#message').val('');
      $('#message').focus();
    }
      
    setInterval(afficheConversation, 4000);
  });