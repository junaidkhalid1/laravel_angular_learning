/**
 * Created by Junaid KHALID on 9/20/2016.
 */

myApp.factory('userModel', ['$http', '$cookies', function ($http, $cookies) {
    var userModel = {};

    $http.defaults.headers.post["Content-Type"] = "application/json";

    userModel.doLogin = function (loginData) {
        console.log(loginData);
        return $http({
            headers: {
                'Content-Type': 'application/json'
            },
            url: baseUrl + 'api/authenticate',
            method: "POST",
            data: {
                email: loginData.email,
                password: loginData.password
            }
        }).success(function (response) {
            console.log(response);
            $cookies.put('auth', response);
        }).error(function(data, status, headers) {
            console.log(data, status, headers);
            //alert(data.message);
            alert('The email or password is incorrect!');
        });
    };
        userModel.getAuthStatus = function () {
            var status = $cookies.get('auth');
            if (status) {
                return true;
            } else {
                return false;
            }
        };

        userModel.doUserLogout = function () {
            $cookies.remove('auth');
        };

    return userModel;
}])

//# sourceMappingURL=models.js.map
