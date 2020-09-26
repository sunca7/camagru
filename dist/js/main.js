function startup() {
  const player = document.getElementById('player');
  const canvas = document.getElementById('canvas');
  const context = canvas.getContext('2d');
  const captureButton = document.getElementById('capture');

  const constraints = {
    video: true,
  };

  const target = document.getElementById('target');

  if (target) {
    target.addEventListener('drop', (e) => {
      e.stopPropagation();
      e.preventDefault();

      doSomethingWithFiles(e.dataTransfer.files);
    });

    target.addEventListener('dragover', (e) => {
      e.stopPropagation();
      e.preventDefault();

      e.dataTransfer.dropEffect = 'copy';
    });
  }

  const fileInput = document.getElementById('file-input');

  if (fileInput) {
    fileInput.addEventListener('change', (e) =>
      doSomethingWithFiles(e.target.files)
    );
  }

  //   navigator.getUserMedia =
  //     navigator.getUserMedia ||
  //     navigator.webkitGetUserMedia ||
  //     navigator.mozGetUserMedia;
  captureButton.addEventListener('click', () => {
    // Draw the video frame to the canvas.
    context.drawImage(player, 0, 0, canvas.width, canvas.height);

    // Stop all video streams.
    // player.srcObject.getVideoTracks().forEach((track) => track.stop());
  });

  if (navigator.getUserMedia) {
    navigator.mediaDevices.getUserMedia(constraints).then((stream) => {
      player.srcObject = stream;
    });
  }
}

window.addEventListener('load', startup);
