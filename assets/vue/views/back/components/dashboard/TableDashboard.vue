<template>
    <section>
        <mdb-row>
            <mdb-col md="6" class="mb-4">
                <mdb-card>
                    <mdb-card-body>
                        <mdb-tbl hover>
                            <thead class="blue-grey lighten-4">
                            <tr>
                                <th>#</th>
                                <th>Lorem</th>
                                <th>Ipsum</th>
                                <th>Dolor</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Cell 1</td>
                                <td>Cell 2</td>
                                <td>Cell 3</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Cell 4</td>
                                <td>Cell 5</td>
                                <td>Cell 6</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Cell 7</td>
                                <td>Cell 8</td>
                                <td>Cell 9</td>
                            </tr>
                            </tbody>
                        </mdb-tbl>
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
            <mdb-col md="6" class="mb-4">
                <mdb-card>
                    <mdb-card-body>
                        <mdb-tbl hover>
                            <thead class="blue lighten-4">
                            <tr>
                                <th>#</th>
                                <th>Lorem</th>
                                <th>Ipsum</th>
                                <th>Dolor</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Cell 1</td>
                                <td>Cell 2</td>
                                <td>Cell 3</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Cell 4</td>
                                <td>Cell 5</td>
                                <td>Cell 6</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Cell 7</td>
                                <td>Cell 8</td>
                                <td>Cell 9</td>
                            </tr>
                            </tbody>
                        </mdb-tbl>
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
        </mdb-row>
    </section>
</template>

<script>
    import { mdbRow, mdbCol, mdbCard, mdbCardBody, mdbTbl,
        mdbBtn, mdbCardHeader, mdbCardText, mdbIcon } from 'mdbvue'
    export default {
        name: "TableDashboard",
        components:{
            mdbRow,
            mdbCol,
            mdbBtn,
            mdbCard,
            mdbCardBody,
            mdbCardHeader,
            mdbCardText,
            mdbIcon,
            mdbTbl,
            mdbBtn,
            mdbCardHeader,
            mdbCardText,
            mdbIcon
        }
    }
</script>

<style scoped>

</style>