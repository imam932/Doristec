var app = angular.module('myApp', ['jtt_youtube', 'youtube-embed']);

app.controller('tutorial', function ($scope, youtubeFactory) {

  // Get Videos in channel
  youtubeFactory.getVideosFromChannelById({
    channelId: "UCRDuxyMCKmyaX5rRDFo-RCQ",
    key: "AIzaSyAiHtxgSZLXBkb5B_z94XSYrjtXUy7NEi0"
  }).then(function (_data) {
    $scope.videos = _data.data.items;
    console.log($scope.videos);
  }).catch(function (_data) {

  });

  // Search tutorial by query
  $scope.search = function () {
    youtubeFactory.getVideosFromChannelById({
      channelId: "UCRDuxyMCKmyaX5rRDFo-RCQ",
      q: $scope.query,
      key: "AIzaSyAiHtxgSZLXBkb5B_z94XSYrjtXUy7NEi0"
    }).then(function (_data) {
      $scope.videos = _data.data.items;
      console.log($scope.videos);
    }).catch(function (_data) {

    });
  };
});
