// declaration function
function declarationFun(radius) {
  const PHI = 3.14;
  const area = PHI * radius * radius;

  return area;
}
// expression function
const expressionFun = function (radius) {
  const PHI = 3.14;
  const area = PHI * radius * radius;

  return area;
};

console.log(declarationFun(3));
console.log(expressionFun(3));
