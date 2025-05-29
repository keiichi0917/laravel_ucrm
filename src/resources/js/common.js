const nl2br = (str) => {
  if (typeof str !== 'string') return ''
  return str.replace(/\n/g, '<br>')
}

const getToday = () => {
 const today = new Date();
 const yyyy = today.getFullYear();
 const mm = ("0"+(today.getMonth()+1)).slice(-2);
 const dd = ("0"+today.getDate()).slice(-2);
 return yyyy+'-'+mm+'-'+dd;
}

export  { nl2br , getToday }
