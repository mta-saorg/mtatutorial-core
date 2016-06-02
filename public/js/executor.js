var currentExecutor = false;

emscripten.print = function(output) {

    console.log(currentExecutor);

    if (!currentExecutor) {
      console.log(output);
      return;
    }

    var currentOutput = $(currentExecutor).find('pre.output');

    currentOutput.html(currentOutput.html() + output + '\n');
};


$(document).ready(function() {

  $('.language-lua').each(function(i, element) {

    var obj = $("<div class=\"executor\">").insertBefore($(element).parent());
    $($(element).parent()).appendTo(obj);

    $(obj).prepend('<label></label>');
    $(obj).find('label').append('<span class="glyphicon glyphicon-play"></span>');
    var runButton = $(obj).find('label span');

    var input = $($(element).parent()).find('code');

    $(obj).append('<code class="executor" style="visibility:hidden;"></code>');
    $(obj).append('<pre class="output" style="visibility:hidden;"></pre>');
    var output = $(obj).find('pre.output');
    $(obj).find('code.executor').text(input.text());


    runButton.click(function() {
      var input = $(obj).find('code.executor');
      currentExecutor = obj;
      console.log(currentExecutor);

      var currentOutput = $(currentExecutor).find('pre.output');
      currentOutput.html("");
      currentOutput.css("visibility", "visible");

      try {
        L.execute(input.text());
      }
      catch (e) {
        output.html(e.toString());
      }
    });

    $(obj).find('label').append('<a class="btn btn-xs btn-info">In Tester kopieren</a>');
    var runTesterButton = $(element).find('label a');
    runTesterButton.click(function() {
      var input = $(element).find('pre');
      openTesterWindow(input.data('code'));
    });
  });

  setTimeout(function() {
    hljs.initHighlightingOnLoad();
  }, 350);
});
