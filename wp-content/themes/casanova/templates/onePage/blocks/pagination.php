<?php

	$paginationComputer = ffContainer::getInstance()->getThemeFrameworkFactory()->getPaginationWPLoop();

	$pagination = $paginationComputer->computePagination();

	if( !empty( $pagination ) ) {
        $beforePagination = '';
        $afterPagination = '';
        $paginationContent = '';
		echo '<div class="pagenavi">';
		foreach( $pagination as $oneItem ) {
			$paginationContent .= ' ';
			switch( $oneItem->type ) {
				case ffPaginationComputer::TYPE_PREV:
					$paginationContent .= '<a href="'.get_pagenum_link( $oneItem->page).'">&lsaquo;</a>';
					break;


				case ffPaginationComputer::TYPE_DOTS_START:
					$paginationContent .= '<a class="no-active">...</a>';
					break;

				case ffPaginationComputer::TYPE_LAST_NUMBER_BUTTON:
                    $afterPagination .= '<a href="'.get_pagenum_link( $oneItem->page).'">'.ff_wp_kses( $query->get('pagination trans-last') ).'</a>';
                    if( $oneItem->selected ) {
                        $paginationContent .= '<span class="current">'.( $oneItem->page ).'</span>';
                    }
                    break;
				case ffPaginationComputer::TYPE_FIRST_NUMBER_BUTTON:
                    $beforePagination .= '<a href="'.get_pagenum_link( $oneItem->page).'">'.ff_wp_kses( $query->get('pagination trans-first') ).'</a>';
                    if( $oneItem->selected ) {
                        $paginationContent .= '<span class="current">'.( $oneItem->page ).'</span>';
                    }
                    break;
				case ffPaginationComputer::TYPE_STD_BUTTON;
				$class = '';
				$href = 'href="'.get_pagenum_link( $oneItem->page).'"';
				if( $oneItem->selected == true ) {
					$class = 'current';
					$href = '';
                    $paginationContent .= '<span '.( $href ).' class="'.esc_attr( $class ).'">'.( $oneItem->page ).'</span>';
				} else {
				    $paginationContent .= '<a '.( $href ).' class="'.esc_attr( $class ).'">'.( $oneItem->page ).'</a>';
                }
				break;

				case ffPaginationComputer::TYPE_DOTS_END:
					$paginationContent .= '<a class="no-active">...</a>';
					break;

				case ffPaginationComputer::TYPE_NEXT:
					$paginationContent .= '<a href="'.get_pagenum_link( $oneItem->page).'">&rsaquo;</a>';
					break;
			}
			$paginationContent .= ' ';
		}
        echo ff_wp_kses( $beforePagination );
        echo ff_wp_kses( $paginationContent );
        echo ff_wp_kses( $afterPagination );
		echo '</div>';
	}




