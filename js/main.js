// valida o formulario de departamentos usando jQUERY!
$(document).ready(function(){ 

  // valida o cadastro de departamentos
  $('#form-departamentos').on('submit', function () {
    var nome = $('#nome');
    var sigla = $('#sigla');
    var msg = $('#msg');

    msg.addClass('hidden');

    if (nome.val() == '') {
      msg.removeClass('hidden').html('Preencha o nome!');
      nome.focus();
      return false;
    }

    if (sigla.val() == '') {
      msg.removeClass('hidden').html('Preencha a sigla!');
      sigla.focus();
      return false;
    }
    return true;
  });

  // função que aplica a MASKARA nos dates - simples mas funciona em partes!
  function dateInputMask(e) {
      var elm = $(this);

      if(e.keyCode < 47 || e.keyCode > 57) {
        e.preventDefault();
      }
      
      var len = elm.val().length;
      if(len !== 1 || len !== 3) {
        if(e.keyCode == 47) {
          e.preventDefault();
        }
      }
      if(len === 2) {
        elm.val(elm.val() + '/');
      }
      if(len === 5) {
        elm.val(elm.val() + '/');
      }
  };
  $('#dt_nascimento, #dt_admissao').keypress(dateInputMask);


  // valida o cadastro de funcionarios
  $('#form-funcionarios').on('submit', function () {
    var nome = $('#nome');
    var dt_nascimento = $('#dt_nascimento');
    var dt_admisssao = $('#dt_admissao');
    var salario = $('#salario');
    var id_departamento = $('#id_departamento');
    var msg = $('#msg');

    msg.addClass('hidden');

    if (nome.val() == '') {
      msg.removeClass('hidden').html('Preencha o nome!');
      nome.focus();
      return false;
    }

    if (dt_nascimento.val() == '') {
      msg.removeClass('hidden').html('Preencha a data de nascimento!');
      dt_nascimento.focus();
      return false;
    }

    if (dt_admisssao.val() == '') {
      msg.removeClass('hidden').html('Preencha a data de admissão!');
      dt_admisssao.focus();
      return false;
    }

    if (salario.val() == '') {
      msg.removeClass('hidden').html('Preencha o salário!');
      salario.focus();
      return false;
    }

    if (id_departamento.val() == '00') {
      msg.removeClass('hidden').html('Selecione o departamento!');
      id_departamento.focus();
      return false;
    }

    return true;
  });
});
