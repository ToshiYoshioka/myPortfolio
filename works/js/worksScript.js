$(document).ready(function(){
  //�y�[�W�������N�X�N���[���[
  $('a[href^="#"]').click(function(){ //href^="#" �� href�����̒l��#�Ŏn�܂�A���J�[�𓥂񂾂�c�̈Ӗ�
    var href = $(this).attr('href');
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $('html,body').animate({
      scrollTop:position
      }, 1000, 'swing');
    return false;
  });
  //�n���o�[�K�[���j���[�̊e���ڂ�data-contents�̔ԍ����擾���āAjson�f�[�^�̃C���f�b�N�X�ԍ����w�肷��
  $('.anken').click(function(e){
    e.preventDefault(); //id���擾����ƃy�[�W�������N�X�N���[���[�ƂԂ���̂�data-contents�������擾���������Ahref���N���b�N���Ă��J�ڂ��铮�����~�߂���
    var id = perseInt($(this).data('contents'));
    changeContents(id); //ajax�̂Ƃ���ŋL�q����changeContents�֐���id�ϐ��������ɂ��ČĂяo��
  });
  
  //changeContents�֐����L�q����
  function changeContents(id){
    //ajax��json�f�[�^��index�ԍ�nth�̊e���ڂ𗬂�����
    $.ajax({
      url: 'data.json', //�ǂݍ��݂����t�@�C���̃p�X
      type: 'POST',  //�ʐM�����ɂ�post���\�b�h��p����
      dataType: 'json' //�f�[�^�t�@�C����json�Ƃ��Ē�`
    })
    .done(function(data,status,xhr){ //ajax�ʐM�ɐ������āAjson�̃f�[�^�����������
        $('#title').html(data[id].title); //�Č�����title�f�[�^�𗬂�����
        $.each(data[id].productSlide, function(imgIndex, imgValue){ //images �̂Ȃ��̊e�f�[�^��
          $('#sliderImage').append($('<li>').append($('<img>', {src:imgValue}))); //<li>��append���āA�����<img src=imgValue>��append����
        })
        $('#assigned').html(data[id].assigned); //�S���Ɩ��T�v��assigned�f�[�^�𗬂�����
        $('#teams').html(data[id].teams); //�|�W�V�����E�`�[����teams�f�[�^�𗬂����� 
        $('#period').html(data[id].period); //�Ή����Ԃ�period�f�[�^�𗬂�����
        $('#language').html(data[id].language); //�Ή������language�f�[�^�𗬂�����
        $('#designTools').html(data[id].designTools); //����c�[����designTools�f�[�^�𗬂�����
        $('#convTools').html(data[id].convTools); //�R�~���j�P�[�V�����c�[����convTools�f�[�^�𗬂�����
        $('#comment').html(data[id].comment); //�R�����g��comment�f�[�^�𗬂�����
        //ajax�ʐM�͒ʏ�̃��N�G�X�g�̏����ƕ��s���đ���̂ŁA�������݂��I����Ă���bxslider�̃I�v�V�������w�肷��
        //���̏��Ԃŏ����Ȃ��ƁA�摜�̓ǂݍ��ݑO�Ƀy�[�W���[���w�肷�邱�ƂɂȂ�̂ł��܂������_�����O����Ȃ�
        $('.worksHistory').bxSlider({ 
          nextSelector:"a#next-btn",
          prevSelector:"a#prev-btn",
          nextText:'',
          prevText:''
        }) //.boxslider()�̕��J�b�R
      }) //.done()�̕��J�b�R
    .fail(function(){  //ajax�ʐM�Ɏ��s�����ꍇ�̏���
      window.alert('�ǂݍ��݃G���[');
    });
  };//changeContents�֐����J�b�R
});
