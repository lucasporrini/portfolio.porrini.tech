window.addEventListener('DOMContentLoaded', function() {
    var canvas = document.getElementById('modelContainer');
    var engine = new BABYLON.Engine(canvas, true);
    var model; // Déclaration de la variable model

    var createScene = function() {
        var scene = new BABYLON.Scene(engine);
        var camera = new BABYLON.ArcRotateCamera("Camera", Math.PI / 2, Math.PI / 2, 2, new BABYLON.Vector3(0, 0, 5), scene);
        camera.attachControl(canvas, false);
        camera.inputs.clear();

        var light = new BABYLON.HemisphericLight("light", new BABYLON.Vector3(1, 1, 0), scene);

        // Charger le modèle 3D
        BABYLON.SceneLoader.ImportMesh("", "/public/assets/model/", "computer.glb", scene, function (newMeshes, particleSystems, skeletons) {
            model = newMeshes[0];
            if (!model) {
                console.error("Le modèle n'a pas été chargé correctement.");
                return;
            }
            model.position.y = 0;
            model.position.x = 0.2;
            model.position.z = 4;

            // La boucle de rendu qui fait tourner le modèle
            engine.runRenderLoop(function() {
                if (model) {
                    model.rotation.y += 0.01; // Ajustez cette valeur pour contrôler la vitesse de rotation
                    scene.render();
                }
            });
        });

        scene.autoClear = false; // Supprimer le fond derrière le modèle
        scene.activeCamera.lowerRadiusLimit = 0; // Dezoomer la caméra

        return scene;
    };

    var scene = createScene();

    // Gérer le redimensionnement de la fenêtre
    window.addEventListener('resize', function() {
        engine.resize();
    });
});
