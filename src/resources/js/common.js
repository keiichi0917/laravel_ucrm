const nl2br = (str) => {
  if (typeof str !== 'string') return ''
  return str.replace(/\n/g, '<br>')
}

export  { nl2br }