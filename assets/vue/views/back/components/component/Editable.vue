<template>
    <!-- Table with panel -->
    <div class="card card-cascade narrower">
        <!--Card image-->
        <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
            <div>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                    <i class="fas fa-th-large mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                    <i class="fas fa-columns mt-0"></i>
                </button>
            </div>
            <a href="" class="white-text mx-3">Table name</a>
            <div>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                    <i class="fas fa-pencil-alt mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                    <i class="fas fa-times mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                    <i class="fas fa-info-circle mt-0"></i>
                </button>
            </div>
        </div>
        <!--/Card image-->
        <div class="px-4">
            <div class="table-wrapper">
                <!--Table-->
                <mdb-tbl class="table table-hover mb-0">
                    <!--Table head-->
                    <mdb-tbl-head>
                        <tr>
                            <th>
                                <input class="form-check-input" type="checkbox" id="checkbox">
                                <label class="form-check-label mr-2" for="checkbox"></label>
                            </th>
                            <th class="th-lg">
                                <a>First Name
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Last Name
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Username
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Username
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Username
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Username
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                        </tr>
                    </mdb-tbl-head>
                    <!--Table head-->

                    <!--Table body-->
                    <mdb-tbl-body>
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" id="checkbox1">
                                <label class="form-check-label" for="checkbox1"></label>
                            </th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-rounded btn-sm px-2">
                                    <i class="fas fa-edit mt-0"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-rounded btn-sm px-2">
                                    <i class="fas fa-trash mt-0" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" id="checkbox2">
                                <label class="form-check-label" for="checkbox2"></label>
                            </th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" id="checkbox3">
                                <label class="form-check-label" for="checkbox3"></label>
                            </th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" id="checkbox4">
                                <label class="form-check-label" for="checkbox4"></label>
                            </th>
                            <td>Paul</td>
                            <td>Topolski</td>
                            <td>@P_Topolski</td>
                            <td>Paul</td>
                            <td>Topolski</td>
                            <td>@P_Topolski</td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" id="checkbox5">
                                <label class="form-check-label" for="checkbox5"></label>
                            </th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </mdb-tbl-body>
                    <!--Table body-->
                </mdb-tbl>
                <!--Table-->
            </div>
        </div>
    </div>
    <!-- Table with panel -->
</template>

<script>
    import { mdbTbl, mdbTblHead, mdbTblBody } from 'mdbvue';
    export default {
        name: "Editable",
        components: {
            mdbTbl,
            mdbTblHead,
            mdbTblBody
        }
    }
</script>

<style scoped>
    .pt-3-half {
        padding-top: 1.4rem;
    }
</style>