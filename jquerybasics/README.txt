1) This creates a grid with 5 columns where each column takes up 1/5 the available width. 

2) We use grid-column: 1 / span 3; to style the components. This means we take up 1 row but span 3 of the columns. If we want to span all of the columns, we would put 5 instead of 3. 

3) Here I have multiple callbacks. The first callback function is the inner most fadeIn. Then a fadeOut and then a fadeIn again. I am chaining fadeIn, css, fadeOut and delay functions. 

$(".Finished").fadeIn(2000, function() {
    $(this).css("color", "blue").fadeOut(2000, function() {
        $(this).delay(1000).fadeIn(2000, function() {
            $(this).css("color", "black")
        })
    })
});