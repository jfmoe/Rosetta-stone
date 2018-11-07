function con(str){
    var mymessage=confirm(str);

    if(mymessage)
    {
        document.write("你是女士!");
    }
    else
    {
        document.write("你是男士!");
    }
}