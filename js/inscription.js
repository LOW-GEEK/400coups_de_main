// Déclaration de constante
const btn = document.getElementById('voir');
const mdp = document.getElementById('mdp');
// Clique afficher/cacher le mot de passe
btn.addEventListener('click', () => {
//   console.log('test');
  mdp.type = mdp.type === 'password' ? 'text' : 'password';   
  btn.innerText = mdp.type === 'password' ?  'Voir Mot de passe': 'Cacher Mot de passe' ;
})


