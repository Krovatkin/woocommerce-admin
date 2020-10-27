/**
 * External dependencies
 */
import { render, screen } from '@testing-library/react';

/**
 * Internal dependencies
 */
import ActivityPanel from '../';

// Mock the panels.
jest.mock( '../panels', () => {
	return {
		getAllPanels: jest.fn().mockImplementation( () => [
			{
				title: 'custom-panel-1',
				count: 10000,
				initialOpen: true,
				panel: <span>Custom panel 1</span>,
			},
			{
				title: 'custom-panel-2',
				count: 20000,
				initialOpen: false,
				panel: <span>Custom panel 2</span>,
			},
		] ),
	};
} );

// Mock the orders.
jest.mock( '../orders/utils', () => {
	return {
		getUnreadOrders: jest.fn().mockImplementation( () => 100 ),
	};
} );

describe( 'ActivityPanel', () => {
	it( 'should render a panel with two rows', () => {
		render( <ActivityPanel /> );
		expect( screen.getByText( 'custom-panel-1' ) ).not.toBeNull();
		expect( screen.getByText( 'custom-panel-2' ) ).not.toBeNull();
	} );

	it( 'should render one visible panel and one hidden panel', () => {
		render( <ActivityPanel /> );
		expect( screen.queryByText( 'Custom panel 1' ) ).toBeInTheDocument();
		expect(
			screen.queryByText( 'Custom panel 2' )
		).not.toBeInTheDocument();
	} );

	it( 'should render the count of unread items', () => {
		render( <ActivityPanel /> );
		expect( screen.queryByText( '10000' ) ).toBeInTheDocument();
		expect( screen.queryByText( '20000' ) ).toBeInTheDocument();
	} );
} );
