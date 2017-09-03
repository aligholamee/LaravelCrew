var value = '641509';
var doorUuid = 'cb0dc199-f45f-4522-be7c-ee4add1e9e6c';
var generatedToken = [];
generatedToken[0] = value;
generatedToken[1] = doorUuid;

postman.setEnvironmentVariable('token',base64url(generatedToken));

function base64url(input) {
    var base64String = btoa(input);
    return urlConvertBase64(base64String);
}
 
function urlConvertBase64(input) {
    var output = input.replace(/=+$/, '');
    output = output.replace(/\+/g, '-');
    output = output.replace(/\//g, '_');
 
    return output;
}