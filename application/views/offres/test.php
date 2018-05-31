


    <button type="button"  onclick="update(this)" class="offrebtn my-1" id="1">Joueur</button>
    <button type="button"  onclick="update(this)" class="offrebtn my-1" id="2">Club </button>
    <button type="button"  onclick="update(this)" class="offrebtn my-1" id="3">last</button>






<div id="a"> a</div>
<div id="b"> b</div>
<div id="c"> c </div>

















<script>
    const a = document.getElementById("a");
    const b = document.getElementById("b");
    const c = document.getElementById("c");

    b.style.display = "none";
    c.style.display = "none";

    const joueur = document.getElementById('1');
    const club = document.getElementById('2');
    const last = document.getElementById('3');
    joueur.style.backgroundColor = '#1ab188';
    club.style.backgroundColor ='rgba(165, 167, 175, 0.41)';
    last.style.backgroundColor ='rgba(165, 167, 175, 0.41)';
    club.style.color ='rgba(255, 255, 255, 0.4)';
    last.style.color ='rgba(255, 255, 255, 0.4)';
    joueur.style.color ='whitesmoke';

    function update(current) {
        let now = current;

        if (now.id == 1) {
            a.style.display = "block";
            b.style.display = "none";
            c.style.display = "none";
            joueur.style.backgroundColor = '#1ab188';
            club.style.backgroundColor ='rgba(165, 167, 175, 0.41)';
            last.style.backgroundColor ='rgba(165, 167, 175, 0.41)';
            club.style.color ='rgba(255, 255, 255, 0.4)';
            last.style.color ='rgba(255, 255, 255, 0.4)';
            joueur.style.color ='whitesmoke';
        }else if (now.id == 2){
            a.style.display = "none";
            b.style.display = "block";
            c.style.display = "none";
            club.style.backgroundColor = '#1ab188';
            joueur.style.backgroundColor ='rgba(165, 167, 175, 0.41)';
            last.style.backgroundColor ='rgba(165, 167, 175, 0.41)';
            joueur.style.color ='rgba(255, 255, 255, 0.4)';
            last.style.color ='rgba(255, 255, 255, 0.4)';
            club.style.color ='whitesmoke';

        }else if (now.id == 3){
            a.style.display = "none";
            b.style.display = "none";
            c.style.display = "block";
            last.style.backgroundColor = '#1ab188';
            club.style.backgroundColor ='rgba(165, 167, 175, 0.41)';
            joueur.style.backgroundColor ='rgba(165, 167, 175, 0.41)';
            club.style.color ='rgba(255, 255, 255, 0.4)';
            joueur.style.color ='rgba(255, 255, 255, 0.4)';
            last.style.color ='whitesmoke';

        }
    }



</script>