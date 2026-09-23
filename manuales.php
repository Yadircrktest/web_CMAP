<?php
$activePage = 'informes';
$tituloPagina = 'Manuales';
include 'includes/header.php';

$manuales = array(
  array(
    'denominacion' => 'MANUAL DEL SISTEMA DE EVALUACIÓN DEL DESEMPEÑO DEL PERSONAL de la Contraloría Municipal.',
    'instrumento'  => 'Resolución N° CMP 061-2010 de fecha 27/12/2010 (G.M. N° 003-2011)',
    'objetivo'     => 'Establece el sistema para evaluar en forma continua, sistemática, permanente, uniforme y objetiva, a los trabajadores.'
  ),
  array(
    'denominacion' => 'MANUALES ADMINISTRATIVOS DE NORMAS Y PROCEDIMIENTO de la Contraloría Municipal.',
    'instrumento'  => 'Resolución N° CMP 062-2010 de fecha 28/12/2010',
    'objetivo'     => 'Instrumento normativo donde se establecen las normas y procedimientos a seguir para el desarrollo de las actividades administrativas de la Contraloría Municipal.'
  ),
  array(
    'denominacion' => 'MANUAL DESCRIPTIVO DE CARGOS de la Contraloría Municipal',
    'instrumento'  => 'Resolución N° CMP 024-2011 de fecha 20/06/2017 (G.M. N° 166-2011)',
    'objetivo'     => 'A través del cual se catalogan los cargos de alto nivel y de confianza de la Contraloría Municipal; contiene la denominación del cargo, propósito y funciones; requisitos mínimos para optar al mismo; conocimiento específico y competencias básicas requeridas.'
  ),
  array(
    'denominacion' => 'MANUAL DE PUESTOS DE TRABAJO de la Contraloría Municipal',
    'instrumento'  => 'Resolución N° CMP 025-2011 de fecha 20/06/2011 (G.M. N° 167-2011)',
    'objetivo'     => 'Instrumento que permite una estructura de puestos de trabajo uniforme para todo el personal obrero, contiene la denominación, tareas y deberes de cada uno de ellos e indicación de los requisitos mínimos generales para su desempeño.'
  ),
  array(
    'denominacion' => 'Reglamento Interno de la Unidad de Auditoría Interna',
    'instrumento'  => 'Resolución N° CMP 019-2015 de fecha 07/04/2015 (G.M. N° 182-2015)',
    'objetivo'     => 'Instrumento donde se establece la estructura organizacional, funciones generales y específicas, la posición jerárquica y los niveles de autoridad.'
  ),
  array(
    'denominacion' => 'Reglamento Interno',
    'instrumento'  => 'Resolución N° CMP 076-2018 de fecha 14/09/2018 (G.M. N° 330-2018)',
    'objetivo'     => 'Normas sobre la estructura, organización, funcionamiento y competencia de las dependencias de la Contraloría Municipal.'
  ),
  array(
    'denominacion' => 'Resolución Organizativa Nº 1',
    'instrumento'  => 'Resolución N° CMP 077-2018 de fecha 14/09/2018 (G.M. N° 331-2018)',
    'objetivo'     => 'Organización y Funcionamiento de los Órganos y Dependencias adscritos a la Contraloría Municipal.'
  ),
  array(
    'denominacion' => 'Resolución Organizativa Nº 2',
    'instrumento'  => 'Resolución N° CMP 078-2018 de fecha 14/09/2018 (G.M. N° 332-2018)',
    'objetivo'     => 'Organización y Funcionamiento de los Órganos y Dependencias adscritos a la Contraloría Municipal.'
  ),
  array(
    'denominacion' => 'Resolución Organizativa Nº 3',
    'instrumento'  => 'Resolución N° CMP 079-2018 de fecha 14/09/2018 (G.M. N° 333-2018)',
    'objetivo'     => 'Organización y Funcionamiento de los Órganos y Dependencias adscritos a la Contraloría Municipal.'
  ),
  array(
    'denominacion' => 'Resolución Organizativa Nº 4',
    'instrumento'  => 'Resolución N° CMP 080-2018 de fecha 14/09/2018 (G.M. N° 334-2018)',
    'objetivo'     => 'Organización y Funcionamiento de los Órganos y Dependencias adscritos a la Contraloría Municipal.'
  ),
  array(
    'denominacion' => 'Resolución Organizativa Nº 5',
    'instrumento'  => 'Resolución N° CMP 081-2018 de fecha 14/09/2018 (G.M. N° 335-2018)',
    'objetivo'     => 'Organización y Funcionamiento de los Órganos y Dependencias adscritos a la Contraloría Municipal.'
  ),
  array(
    'denominacion' => 'Resolución Organizativa Nº 6',
    'instrumento'  => 'Resolución N° CMP 082-2018 de fecha 14/09/2018 (G.M. N° 336-2018)',
    'objetivo'     => 'Organización y Funcionamiento de los Órganos y Dependencias adscritos a la Contraloría Municipal.'
  ),
  array(
    'denominacion' => 'Manual de Normas y Procedimientos de Auditoría de Estado de la Unidad de Auditoría Interna.',
    'instrumento'  => 'Resolución N° CMP 089-2018 de fecha 28/09/2018 (G.M. N° 347-2018)',
    'objetivo'     => 'Instrumento normativo donde se establecen las normas y procedimientos a seguir para el desarrollo de las actuaciones de control fiscal, estableciendo criterios, metodologías y procesos de la Auditoría que le corresponde efectuar a la Unidad de Auditoría Interna.'
  ),
  array(
    'denominacion' => 'LINEAMIENTOS DE INDICADORES DE GESTIÓN para medir el desempeño de las dependencias de esta Contraloría Municipal.',
    'instrumento'  => 'Resolución N° CMAP 102-2018 de fecha 01/10/2018 (G.M. N° 379-2018)',
    'objetivo'     => 'Considerando que la planificación pública se fundamenta en elementos como la medición o incorporación de indicadores y fuentes de verificación que permitan constatar el alcance de los objetivos, metas y resultados previstos y evalúa la eficacia, eficiencia, efectividad e impacto de los planes operativos formulados con la finalidad de concretar los proyectos, recursos, objetivos y metas, trazados en los planes estratégicos, según lo dispuesto en el Decreto con R. V. y F. de Ley de Reforma de la Ley Orgánica de Planificación Pública y Popular.'
  ),
  array(
    'denominacion' => 'Reglamento de Viáticos y Gastos de Transporte y Eventos Deportivos de los Trabajadores de la Contraloría del Municipio "Ambrosio Plaza"',
    'instrumento'  => 'Resolución N° CMP 105-2018 de fecha 04/12/2018 (G.M. N° 414-2018)',
    'objetivo'     => 'Normas sobre la ejecución de viáticos, gastos de transporte y eventos deportivos.'
  ),
  array(
    'denominacion' => 'Reglamento de Permisos de la Contraloría del Municipio "Ambrosio Plaza".',
    'instrumento'  => 'Resolución N° CMAP 027-201 de fecha 12/08/2019 (Acto Administrativo Interno)',
    'objetivo'     => 'Normas sobre la ejecución de permisos laborales.'
  ),
  array(
    'denominacion' => 'MANUAL DE NORMAS Y PROCEDIMIENTOS EN MATERIA DE POTESTAD INVESTIGATIVA de la Oficina de Control Posterior de esta Contraloría Municipal',
    'instrumento'  => 'Resolución N° CMAP 005-2021 de fecha 18/02/2021 (G.M. N° 102-2021)',
    'objetivo'     => 'Describe las actividades que debe realizar la Unidad de Potestad Investigativa, adscrita a la Oficina de Control Posterior, encargada de ejercer la valoración de los informes definitivos, desprendidos de las actuaciones fiscales llevadas a cabo por la Unidad de Actuaciones Fiscales de esta Contraloría Municipal, según lo establece la LOCGRSNCF y su Reglamento.'
  ),
  array(
    'denominacion' => 'MANUAL DE NORMAS Y PROCEDIMIENTOS DE AUDITORÍA DE ESTADO de la Oficina de Control Posterior de esta Contraloría Municipal',
    'instrumento'  => 'Resolución N° CMAP 006-2021 de fecha 18/02/2021 (G.M. N° 103-2021)',
    'objetivo'     => 'Instrumento contentivo de la Base Normativa y Normas de Auditoría (Planificación de la Auditoría, Ejecución de la Auditoría, Presentación de Resultados, Seguimiento al Plan de Acciones Correctivas y Papeles de Trabajo); Procedimientos de Auditoría (Planificación de la Auditoría, Ejecución de la Auditoría y Presentación de Resultados).'
  ),
  array(
    'denominacion' => 'LINEAMIENTOS PARA LA FORMACIÓN, PARTICIPACIÓN Y RENDICIÓN DE LA CUENTA de los órganos y entes de este Municipio',
    'instrumento'  => 'Resolución N° CMAP 007-2021 de fecha 18/02/2021 (G.M. N° 104-2021)',
    'objetivo'     => 'Instrumento contentivo de las normas que regulan la organización y presentación de la información financiera de estos organismos, incluyen: la organización de los soportes de la cuenta para su examen; la dotación de recursos humanos, materiales y financieros; entre otros.'
  ),
  array(
    'denominacion' => 'MANUAL PARA LOS AUDITORES de la Oficina de Control Posterior de la Contraloría Municipal',
    'instrumento'  => 'Resolución N° CMAP 008-2021 de fecha 18/02/2021 (G.M. N° 105-2021)',
    'objetivo'     => 'Manual cuyo contenido comprende el fundamento legal; normas de auditoría (planificación de la auditoría, ejecución de la auditoría, presentación de resultados, seguimiento al plan de acciones correctivas y papeles de trabajo); entre otros.'
  ),
  array(
    'denominacion' => 'MANUAL DE NORMAS Y PROCEDIMIENTOS DE DETERMINACIÓN DE RESPONSABILIDAD ADMINISTRATIVA de esta Contraloría Municipal',
    'instrumento'  => 'Resolución N° CMAP 009-2021 de fecha 02/03/2021 (G.M. N° 111-2021)',
    'objetivo'     => 'Instrumento normativo que contiene las normas, procedimientos y otros elementos de sistematización de las actividades realizadas en el Procedimiento Administrativo para la Determinación de Responsabilidades, tendente a declarar la responsabilidad administrativa y formular reparos.'
  ),
  array(
    'denominacion' => 'MANUAL DE NORMAS Y PROCEDIMIENTOS PARA LA IMPOSICIÓN DE MULTAS',
    'instrumento'  => 'Resolución N° CMAP 010-2021 de fecha 02/03/2021 (G.M. N° 112-2021)',
    'objetivo'     => 'Contiene las normas y procedimientos que regulan la imposición de la multa, prevista en el artículo 94 de la Ley Orgánica de la Contraloría General de la República y del Sistema Nacional de Control Fiscal.'
  ),
  array(
    'denominacion' => 'MANUAL DE NORMAS Y PROCEDIMIENTOS DE CONTRATACIONES PÚBLICAS',
    'instrumento'  => 'Resolución N° CMAP 007-2022 de fecha 08/02/2022 (G.M. N° 139-2021)',
    'objetivo'     => 'Tiene por objeto establecer definiciones y procedimientos básicos que orienten al organismo en lo referente a los procesos de contrataciones para la adquisición de bienes, prestación de servicios y ejecución de obras, establecidos en la Ley de Contrataciones Públicas vigente y demás normas que le sean aplicables.'
  ),
  array(
    'denominacion' => 'MANUAL DE NORMAS Y PROCEDIMIENTOS DE PRESENTACIÓN Y ATENCIÓN DE DENUNCIAS, QUEJAS, RECLAMOS, SUGERENCIAS Y PETICIONES de la Oficina de Atención al Ciudadano y Control Social',
    'instrumento'  => 'Resolución N° CMAP 008-2022 de fecha 08/02/2022 (G.M. N° 140-2022)',
    'objetivo'     => 'El referido Manual desarrolla las normas y los procedimientos que debe llevar la Oficina de Atención al Ciudadano y Control Social (O.A.C.C.S.) de esta Contraloría Municipal, para atender a los ciudadanos del Municipio, en cuanto a sus peticiones, reclamos, quejas y denuncias.'
  ),
  array(
    'denominacion' => 'PLAN ESTRATÉGICO DE LA CONTRALORÍA MUNICIPAL correspondiente al periodo 2023 - 2027.',
    'instrumento'  => 'Resolución N° CMAP 025-2022 de fecha 31/10/2022 (G.M. N° 372-2022)',
    'objetivo'     => 'Instrumento a través del cual la Contraloría Municipal establece los proyectos, objetivos, metas, acciones y recursos dirigidos a darle concreción a los lineamientos plasmados en el Plan de Desarrollo Económico y Social de la Nación de Venezuela, formulado por el Presidente de la República y presentado a la Asamblea Nacional.'
  ),
  array(
    'denominacion' => 'Reformulación del Reglamento Interno.',
    'instrumento'  => 'Resolución N° CMAP 009-2023 de fecha 08/05/2023 (G.M. N° 034-2023)',
    'objetivo'     => 'Reformulación y modificación de la resolución Nº CMAP 076-2018 de fecha 14/09/2018, publicada en la Gaceta Municipal Nº 330-2018 de fecha 24/09/2018, contentiva del Reglamento Interno de la Contraloría del Municipio "Ambrosio Plaza" del Estado Bolivariano de Miranda.'
  ),
  array(
    'denominacion' => 'Reformulación de la Estructura Organizativa Nº 1',
    'instrumento'  => 'Resolución N° CMAP 010-2023 de fecha 08/05/2023 (G.M. N° 034-2023)',
    'objetivo'     => 'Reformulación y modificación de la resolución Nº CMAP 077-2018 de fecha 14/09/2018, publicada en la Gaceta Municipal Nº 331-2018 de fecha 24/09/2018, contentiva de la Resolución Organizativa Nº 1, la cual define la estructura, organización, funcionamiento y ámbito de competencia de esta Contraloría Municipal; Despacho del Contralor Municipal; Unidad de Auditoría Interna; Oficina de Planificación y Control de Gestión; Unidad de Servicios Jurídicos y; Oficina de Atención al Ciudadano; así como de las Unidades y áreas que la conforman.'
  ),
  array(
    'denominacion' => 'Reformulación de la Estructura Organizativa Nº 4',
    'instrumento'  => 'Resolución N° CMAP 011-2023 de fecha 08/05/2023 (G.M. N° 034-2023)',
    'objetivo'     => 'Reformulación y modificación de la resolución Nº CMAP 080-2018 de fecha 14/09/2018, publicada en la Gaceta Municipal Nº 334-2018 de fecha 24/09/2018, contentiva de la Resolución Organizativa Nº 4 de la Contraloría del Municipio "Ambrosio Plaza" del Estado Bolivariano de Miranda, la cual define la estructura, organización, funcionamiento y ámbito de competencia de la Oficina de Administración y Servicios (DAS) de esta Contraloría Municipal; así como de las Unidades y áreas que las conforman.'
  )
);
?>
<main id="contenido">
  <section class="encabezado-pagina">
    <div class="contenedor">
      <p class="migaja"><a href="index.php">Inicio</a> / <a href="informes.php">Informes</a> / Manuales</p>
      <h1>Manuales</h1>
      <p>Normas y procedimientos de la Contraloría Municipal: manuales, reglamentos, resoluciones organizativas y lineamientos aprobados por el Despacho del Contralor.</p>
    </div>
  </section>

  <section class="seccion subseccion" id="manuales">
    <div class="contenedor">
      <h2 class="subseccion-titulo">Instrumentos Aprobados por el Despacho del Contralor</h2>
      <p style="margin-bottom:24px;">Relación de manuales y demás instrumentos normativos vigentes de la Contraloría Municipal, con su denominación, instrumento de aprobación y objetivo.</p>

      <div class="buscador">
        <label class="buscador-label" for="buscarManual">Buscar manual</label>
        <div class="buscador-visor">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
          <input type="search" id="buscarManual" placeholder="Buscar por denominación del manual…" autocomplete="off" aria-label="Buscar manual por denominación" aria-controls="tablaManuales">
        </div>
      </div>

      <div class="tabla-envuelve">
        <table class="tabla-manuales">
          <thead>
            <tr>
              <th scope="col">N.°</th>
              <th scope="col">Denominación</th>
              <th scope="col">Instrumento y fecha de aprobación</th>
              <th scope="col">Objetivo</th>
            </tr>
          </thead>
          <tbody id="tablaManuales">
            <?php $num = 1; foreach ($manuales as $m): ?>
            <tr>
              <td><?php echo $num++; ?></td>
              <td><?php echo htmlspecialchars($m['denominacion']); ?></td>
              <td><?php echo htmlspecialchars($m['instrumento']); ?></td>
              <td><?php echo htmlspecialchars($m['objetivo']); ?></td>
            </tr>
            <?php endforeach; ?>
            <tr id="sinResultados" class="fila-sin-resultados" style="display:none;">
              <td colspan="4">No se encontraron manuales que coincidan con el nombre buscado.</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="centrar">
        <a class="btn btn-contorno-azul" href="informes.php">Volver a Informes</a>
      </div>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>