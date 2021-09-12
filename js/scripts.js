document.addEventListener('DOMContentLoaded', () => {
    let body = document.querySelector('body');
    let access = document.querySelector("#access");
    let accessActive = false;


    // Menu d'accessibilité //
    body.addEventListener('keydown', (e) => {
        console.log(e);
        if(e.key === "Tab"){
            access.classList.toggle("displayNone");
            accessActive = !accessActive;
        }
        else{
            if(accessActive){
                let redir = ""
                switch(e.key){
                    case '1':
                        redir = "#parcours";
                        break;
                    case '2':
                        redir = "#formation";
                        break;
                    case '3':
                        redir = "#alternance";
                        break;
                    case '4':
                        redir = "#next";
                        break;
                    case '5':
                        redir = "#points";
                        break;
                    case '6':
                        redir="#hobby";
                    default:
                }
                if(redir !== ""){
                    window.location.href = redir;
                }
            }
        }
        
    })
})