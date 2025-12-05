@extends('layouts.merge.site')
@section('titulo', 'Agenda do Evento')
@section('content')
    <section class="hero-page">
        <img src="/site/img/banner/bn-7.jpg" loading="lazy" alt="" class="image-background-banner">
        <div class="overlay-page _1">
            <div class="contain">
                <div class="text-banner">
                    <div class="texto-conteudo-hero">
                        <h1 class="heading-13 white">Agenda do Evento</h1>
                        <div class="linha-vermelha"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="section-17 b">
        <div class="contain">
            <div class="div-block-315 _8">
                <p class="paragraph-13">
                    Através de palestras, workshops e demonstrações práticas, o evento pretende
                    inspirar e promover a colaboração e a acção em direcção a um futuro mais
                    promissor e interconectado.
                    <br>
                    O <b>Angotic 2026</b> promete ser um espaço de ideias revolucionárias e parcerias
                    transformadoras, moldando o curso da inovação global para os anos vindouros.
                </p>
            </div>
            <div class="div-block-266">
                <div data-current="Tab 1" data-easing="ease" data-duration-in="300" data-duration-out="100"
                    class="tabs w-tabs">
                    <div class="tabs-menu-2 _1 w-tab-menu">
                        <a data-w-tab="Tab 1" class="tab-programa w-inline-block w-tab-link w--current">
                            <div>1º DIA</div>
                        </a>
                        <a data-w-tab="Tab 2" class="tab-programa w-inline-block w-tab-link">
                            <div>2º DIA</div>
                        </a>
                        <a data-w-tab="Tab 3" class="tab-programa w-inline-block w-tab-link">
                            <div>3º DIA</div>
                        </a>
                    </div>
                    <div class="tabs-content w-tab-content">
                        <div data-w-tab="Tab 1" class="tab-pane-tab-1 w-tab-pane w--tab-active">
                            <div class="div-block-213">

                                <div class="div-block-211">
                                    <div class="div-block-212">
                                        <div class="text-block-71">Horário</div>
                                    </div>
                                    <div class="div-block-212 evento">
                                        <div class="text-block-71">Evento</div>
                                    </div>
                                    <div class="div-block-212 tema">
                                        <div class="text-block-71">Tema</div>
                                    </div>
                                    <div class="div-block-212 local">
                                        <div class="text-block-71">Local</div>
                                    </div>
                                </div>

                                @foreach ($schedulesI as $row)
                                    <div class="div-block-214">
                                        <div class="div-block-215 h">
                                            <div class="text-block-72 h">08:30 - 09:45</div>
                                        </div>
                                        <div class="div-block-215 evento">
                                            <div class="text-block-72">Recepção e Credenciamento</div>
                                        </div>
                                        <div class="div-block-215 tema">
                                            <div class="text-block-72">Welcome</div>
                                        </div>
                                        <div class="div-block-215 local">
                                            <div class="text-block-72">CCTA</div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div data-w-tab="Tab 2" class="w-tab-pane">
                            <div class="div-block-213">

                                <div class="div-block-211">
                                    <div class="div-block-212 h">
                                        <div class="text-block-71">Horário</div>
                                    </div>
                                    <div class="div-block-212 evento">
                                        <div class="text-block-71">Evento</div>
                                    </div>
                                    <div class="div-block-212 tema">
                                        <div class="text-block-71">Tema</div>
                                    </div>
                                    <div class="div-block-212 local">
                                        <div class="text-block-71">Local</div>
                                    </div>
                                </div>

                                @foreach ($schedulesII as $row)
                                    <div class="div-block-214">
                                        <div class="div-block-215 h">
                                            <div class="text-block-72 h">09:00 - 10:30</div>
                                        </div>
                                        <div class="div-block-215 evento">
                                            <div class="text-block-72">Painel de Alto Nível II</div>
                                        </div>
                                        <div class="div-block-215 tema">
                                            <div class="text-block-72">Modernização, Digitalização, IA e
                                                Blockchain:Transformando o Sector de
                                                Transporte e Logistica em Africa</div>
                                        </div>
                                        <div class="div-block-215 local">
                                            <div class="text-block-72">Grande Auditório</div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div data-w-tab="Tab 3" class="w-tab-pane">
                            <div class="div-block-213">

                                <div class="div-block-211">
                                    <div class="div-block-212 h">
                                        <div class="text-block-71">Horário</div>
                                    </div>
                                    <div class="div-block-212 evento">
                                        <div class="text-block-71">Evento</div>
                                    </div>
                                    <div class="div-block-212 tema">
                                        <div class="text-block-71">Tema</div>
                                    </div>
                                    <div class="div-block-212 local">
                                        <div class="text-block-71">Local</div>
                                    </div>
                                </div>

                                @foreach ($schedulesIII as $row)
                                    <div class="div-block-214">
                                        <div class="div-block-215 h">
                                            <div class="text-block-72 h">09:00 - 10:30</div>
                                        </div>
                                        <div class="div-block-215 evento">
                                            <div class="text-block-72">Mesa Redonda II</div>
                                        </div>
                                        <div class="div-block-215 tema">
                                            <div class="text-block-72">Transporte Sustentável e Economia Verde</div>
                                        </div>
                                        <div class="div-block-215 local">
                                            <div class="text-block-72">Grande Auditório</div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="section-27 _2">
        <div class="overlay-hero">
            <div class="contain w-clearfix">
                <div class="div-block-248 w-clearfix">
                    <div class="div-block-copy">
                        <p class="heading-13 _700">Conecte-se com líderes e ideias em um ambiente inspirador<br>Reserve seu
                            ingresso hoje!<br></p>
                        <div class="div-block-el _1">
                            <a href="{{ route('site.home') }}" class="button w-button">Participe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contain"></div>
    </section>
@endsection
