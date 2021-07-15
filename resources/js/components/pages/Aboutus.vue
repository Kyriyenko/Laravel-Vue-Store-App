<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <v-banner></v-banner>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <figure>
                                <img src="https://cdn.pixabay.com/photo/2019/03/18/06/46/cyber-4062449_960_720.jpg"
                                     alt="#">
                            </figure>
                        </div>
                        <div class="col-md-12">
                            <div class="about-text">
                                <div class="about-heading-wrap">
                                    <h2 class="about-heading mb_20 mt_40 ptb_10">themini Design is Best Part of
                                        <span>my Life</span>
                                    </h2>
                                </div>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form, by injected humour, or randomised words which
                                    don't look even slightly believable. If you are going to use a passage of Lorem
                                    Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of
                                    text. All the Lorem Ipsum generators on the Internet tend to repeat predefined
                                    chunks as necessary, making this the first true generator on the Internet. It uses a
                                    dictionary of over 200 Latin words, combined with a handful of model sentence
                                    structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem of
                                    text. All the Lorem Ipsum generators on the Internet tend to repeat predefined
                                    chunks as necessary, making this the first true generator on the Internet. It uses a
                                    Ipsum is therefore always free from repetition, injected humour, or
                                    non-characteristic words etc.
                                </p>
                                <button type="button" class="btn mt-3 mb-3">HIRE ME</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="heading-part mb_20 mt_40">
                                <h2 class="main_title">What We Do?</h2>
                            </div>
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default pull-left">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapseOne">1. What is HTML?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <p>HTML is a computer language devised to can then b the Internet. It is
                                                relatively easy to learn, with the basics being accessible.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default pull-left">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapseTwo">2. What is Bootstrap?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Bootstrap is the most popular HTML, CSS, and JS frameen I discovered
                                                Bootstrap a few was still gaining in popularity, addition to HTML, CSS
                                                and JS.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default pull-left">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">3.
                                                What is CSS?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Cascading Style Sheets, fondly referred to as CSS, is a simple design
                                                language intended to simplify the procrt of a web page. Using CSS.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Aboutus"
}
</script>

<style scoped>

.btn{
    background-color: #424242;
    color: #ffffff;
}

</style>
