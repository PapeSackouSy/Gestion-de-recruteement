@include('Dashboard.Dashboard')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex flex-column">
        <div class="d-flex align-items-center justify-content-center flex-grow-1">
            <div class="row justify-content-center w-100">
                <div class="col-md-7 col-lg-10 col-xxl-10 mt-3">
                    <div class="card mb-2">
                        <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                            <h2>Créer une nouvelle évaluation</h2>

                            <form action="{{route('AjouterEvaluation',$iduser)}}" method="POST">
                                @csrf
                                <div id="criteria-container">
                                    <div class="criteria-group">
                                        <div class="form-group">
                                            <label for="critere[]">Critère</label>
                                            <input type="text" name="critere[]" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="score[]">Score</label>
                                            <input type="number" name="score[]" class="form-control" min="0" max="100" required>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" id="add-criteria" class="btn btn-secondary">Ajouter un critère</button>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </form>
                        </div>

                        <script>
                        document.getElementById('add-criteria').addEventListener('click', function() {
                            let container = document.getElementById('criteria-container');
                            let criteriaGroup = document.createElement('div');
                            criteriaGroup.classList.add('criteria-group');
                            criteriaGroup.innerHTML = `
                                <div class="form-group">
                                    <label for="critere[]">Critère</label>
                                    <input type="text" name="critere[]" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="score[]">Score</label>
                                    <input type="number" name="score[]" class="form-control" min="0" max="100" required>
                                </div>
                                 <div class="col-md-2 d-flex align-items-end">
                                      <button type="button" class="btn btn-danger remove-criteria">Supprimer</button>
                                 </div><br>
                            `;
                            container.appendChild(criteriaGroup);
                            attachRemoveCriteriaEvent(criteriaGroup);
                        });
                        function attachRemoveCriteriaEvent(criteriaGroup) {
                            let removeButton = criteriaGroup.querySelector('.remove-criteria');
                            removeButton.addEventListener('click', function() {
                                criteriaGroup.remove();
                            });
                        }
                        document.querySelectorAll('.criteria-group').forEach(function(group) {
                         attachRemoveCriteriaEvent(group);
                        });
                        </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
