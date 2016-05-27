var currentExecutor = null;

// Define Lua functions
var Module = {
  print: function(output) {
    if (!currentExecutor) {
      console.log(output);
      return;
    }

    var outputPre = $(currentExecutor).find('pre.output');
    outputPre.html(outputPre.html() + output + '\n');
  }
};


// Add execute buttons (and its actions)
$(document).ready(function() {
  /* <script>hljs.initHighlightingOnLoad();</script> */

  $('.language-lua').each(function(i, element) {
    //$(element).parent().prepend('')

    var obj = $("<div class=\"executor\">").insertBefore($(element).parent());
    $($(element).parent()).appendTo(obj);

    $(obj).prepend('<label></label>');
    $(obj).find('label').append('<span class="glyphicon glyphicon-play"></span>');
    var runButton = $(obj).find('label span');

    var input = $($(element).parent()).find('code');

    $(obj).append('<code class="executor" style="visibility:hidden;"></code>');
    $(obj).append('<pre class="output"></pre>');
    $(obj).find('code.executor').text(input.text());
    //code.text();


    runButton.click(function() {
      var input = $(obj).find('code.executor');
      currentExecutor = element;

      if ($(currentExecutor).children('pre.output').length == 0) {
        $(currentExecutor).append('<pre class="output"></pre>');
      }

      var outputPre = $(currentExecutor).find('pre.output');
      outputPre.html('');

      console.log(input.text());

      try {
        L.execute(input.text());
      }
      catch (e) {
        outputPre.html(e.toString());
      }
    });

    // Add "run in tester" button
    $(obj).find('label').append('<a class="btn btn-xs btn-info">In Tester kopieren</a>');
    var runTesterButton = $(element).find('label a');
    runTesterButton.click(function() {
      var input = $(element).find('pre');
      openTesterWindow(input.data('code'));
    });
  });

  //hljs.initHighlightingOnLoad();
});
